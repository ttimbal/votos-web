<?php


namespace App\Core\Business;


use App\Core\Models\DetalleReserva;
use App\Core\Repositories\AlmacenRepository;
use App\Core\Repositories\DetalleReservaRepository;
use App\Core\Repositories\DocenteRepository;
use App\Core\Repositories\InstrumentoRepository;
use App\Core\Repositories\ReservaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class ReservaBusiness
{
    protected $reservaRepository;
    protected $instrumentoRepository;
    protected $almacenRepository;
    protected $detalleReservaRepository;
    protected $docenteRepository;

    public function __construct(ReservaRepository $reservaRepository,
                                InstrumentoRepository $instrumentoRepository,
                                AlmacenRepository  $almacenRepository,
                                DetalleReservaRepository $detalleReservaRepository,
                                DocenteRepository $docenteRepository)
    {
        $this->reservaRepository=$reservaRepository;
        $this->instrumentoRepository=$instrumentoRepository;
        $this->almacenRepository=$almacenRepository;
        $this->detalleReservaRepository=$detalleReservaRepository;
        $this->docenteRepository=$docenteRepository;
    }

    public function index()
    {
        try {
            $prestamos = $this->reservaRepository->index();
            $data['reservas'] = $prestamos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
    public function create()
    {
        try {
            $instrumentos = $this->instrumentoRepository->getAllAvailables();
            $almacenes=$this->almacenRepository->all();
            $data['instrumentos'] = $instrumentos;
            $data['almacenes'] = $almacenes;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
//            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $reserva=$this->reservaRepository->store($request);
            $request['reserva_id']=$reserva->id;
            $this->detalleReservaRepository->store($request);
            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
//            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($id)
    {
        try {
            $reserva = $this->reservaRepository->find($id);
            $instrumentosDelPrestamo = $this->detalleReservaRepository->getTodosLosNumerosDeInstrumentosDeUnaReserva($id);
            $docente = $this->docenteRepository->getDocente($reserva->docente_id);
            $data['reserva'] = $reserva;
            $data['instrumentos'] = $instrumentosDelPrestamo;
            $data['docente'] = $docente;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->detalleReservaRepository->deleteAll($id);
            $this->reservaRepository->destroy($id);
            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

}
