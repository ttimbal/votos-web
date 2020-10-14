<?php


namespace App\Core\Business;


use App\Core\Repositories\AlmacenRepository;
use App\Core\Repositories\CompraRepository;
use App\Core\Repositories\InstrumentoRepository;
use App\Core\Repositories\NombreInstrumentoRepository;
use App\Core\Repositories\ProveedorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstrumentoBusiness
{
    protected $instrumentoRepository;
    protected $almacenRepository;
    protected $nombreInstrumentoRepository;
    protected $compraRepository;
    protected $proveedorRepository;

    public function __construct(InstrumentoRepository $instrumentoRepository,
                                AlmacenRepository $almacenRepository,
                                NombreInstrumentoRepository $nombreInstrumentoRepository,
                                CompraRepository $compraRepository, ProveedorRepository $proveedorRepository)
    {
        $this->instrumentoRepository = $instrumentoRepository;
        $this->almacenRepository = $almacenRepository;
        $this->nombreInstrumentoRepository = $nombreInstrumentoRepository;
        $this->compraRepository = $compraRepository;
        $this->proveedorRepository = $proveedorRepository;
    }

    public function index()
    {
        try {
            $instrumentos = $this->instrumentoRepository->index();
            $proveedores = $this->proveedorRepository->all();
            $proveedores->load('persona');
            $data['instrumentos'] = $instrumentos;
            $data['proveedores'] = $proveedores;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $almacenes = $this->almacenRepository->all();
            $nombre_instrumentos = $this->nombreInstrumentoRepository->all();
            $estados = $this->instrumentoRepository->getEstados();
            $compras = $this->compraRepository->all();
            $proveedores = $this->proveedorRepository->all();
            $proveedores->load('persona');
            $data['almacenes'] = $almacenes;
            $data['nombre_instrumentos'] = $nombre_instrumentos;
            $data['estados'] = $estados;
            $data['compras'] = $compras;
            $data['proveedores'] = $proveedores;
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

            $this->instrumentoRepository->store($request);

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
            $instrumento = $this->instrumentoRepository->show($numero);
            $compras = $this->compraRepository->all();
            $proveedores = $this->proveedorRepository->all();
            $proveedores->load('persona');
            $data['instrumento'] = $instrumento;
            $data['compras'] = $compras;
            $data['proveedores'] = $proveedores;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($numero)
    {
        try {
            $instrumento = $this->instrumentoRepository->find($numero);
            $nombre_instrumentos = $this->nombreInstrumentoRepository->all();
            $almacenes = $this->almacenRepository->all();
            $estados = $this->instrumentoRepository->getEstados();
            $data['instrumento'] = $instrumento;
            $data['nombre_instrumentos'] = $nombre_instrumentos;
            $data['almacenes'] = $almacenes;
            $dat['estados'] = $estados;
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

            $this->instrumentoRepository->update($request, $numero);

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

            $this->instrumentoRepository->destroy($numero);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
