<?php


namespace App\Core\Business;


use App\Core\Repositories\DetallePedidoRepository;
use App\Core\Repositories\NombreInstrumentoRepository;
use App\Core\Repositories\PedidoRepository;
use App\Core\Repositories\ProveedorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoBusiness
{
    protected $pedidoRepository;
    protected $nombreInstrumentoRepository;
    protected $proveedorRepository;
    protected $detallePedidoRepository;

    public function __construct(PedidoRepository $pedidoRepository, NombreInstrumentoRepository $nombreInstrumentoRepository,
                                ProveedorRepository $proveedorRepository, DetallePedidoRepository $detallePedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
        $this->nombreInstrumentoRepository = $nombreInstrumentoRepository;
        $this->proveedorRepository = $proveedorRepository;
        $this->detallePedidoRepository = $detallePedidoRepository;
    }

    public function index()
    {
        try {
            $pedidos = $this->pedidoRepository->index();
            $data['pedidos'] = $pedidos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $proveedores = $this->proveedorRepository->all();
            $proveedores->load('persona');
            $nombreInstrumentos = $this->nombreInstrumentoRepository->all();
            $data['proveedores'] = $proveedores;
            $data['nombreInstrumentos'] = $nombreInstrumentos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $pedido = $this->pedidoRepository->store($request);
            $request['numero'] = $pedido->numero; //necesario para los otros metodos
            $this->detallePedidoRepository->store($request); //usa numero

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($numero)
    {
        try {
            $pedido = $this->pedidoRepository->show($numero);
            $detalles = $this->detallePedidoRepository->find($numero);
            $data['pedido'] = $pedido;
            $data['detalles'] = $detalles;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($numero)
    {
        try {
            $pedido = $this->pedidoRepository->show($numero);
            $detalles = $this->detallePedidoRepository->find($numero);
            $proveedores = $this->proveedorRepository->all();
            $nombreInstrumentos = $this->nombreInstrumentoRepository->all();
            $data['pedido'] = $pedido;
            $data['detalles'] = $detalles;
            $data['proveedores'] = $proveedores;
            $data['nombreInstrumentos'] = $nombreInstrumentos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $numero)
    {
        try {
            DB::beginTransaction();

            $this->pedidoRepository->update($request, $numero);
            $this->detallePedidoRepository->update($request, $numero);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($numero)
    {
        try {
            DB::beginTransaction();

            $this->pedidoRepository->destroy($numero);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
