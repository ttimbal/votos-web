<?php


namespace App\Core\Business;


use App\Core\Repositories\AdministrativoRepository;
use App\Core\Repositories\AlmacenRepository;
use App\Core\Repositories\DetallePrestamoRepository;
use App\Core\Repositories\DocenteRepository;
use App\Core\Repositories\InstrumentoRepository;
use App\Core\Repositories\PersonaRepository;
use App\Core\Repositories\PrestamoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoBusiness
{
    protected $prestamoRepository;
    protected $instrumentoRepository;
    protected $administrativoRepository;
    protected $docenteRepository;
    protected $detallePrestamoRepository;
    protected $personaRepository;
    protected $almacenRepository;

    public function __construct(PrestamoRepository $prestamoRepository,
                                InstrumentoRepository $instrumentoRepository,
                                AdministrativoRepository $administrativoRepository,
                                DocenteRepository $docenteRepository,
                                DetallePrestamoRepository $detallePrestamoRepository,
                                PersonaRepository $personaRepository,
                                AlmacenRepository  $almacenRepository)
    {
        $this->prestamoRepository = $prestamoRepository;
        $this->instrumentoRepository = $instrumentoRepository;
        $this->administrativoRepository = $administrativoRepository;
        $this->docenteRepository = $docenteRepository;
        $this->detallePrestamoRepository = $detallePrestamoRepository;
        $this->personaRepository = $personaRepository;
        $this->almacenRepository = $almacenRepository;
    }

    public function index()
    {
        try {
            $prestamos = $this->prestamoRepository->index();
            $data['prestamos'] = $prestamos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $instrumentos = $this->instrumentoRepository->allAvailabre();
            $estadoInstrumentos = $this->detallePrestamoRepository->getEstados();
            $administrativos = $this->administrativoRepository->all();
            $administrativos->load('persona');
            $cargoAdministrativos = $this->administrativoRepository->getCargos();
            $docentes = $this->docenteRepository->all();
            $almacenes=$this->almacenRepository->all();
            $docentes->load('persona');
            $data['instrumentos'] = $instrumentos;
            $data['estadoInstrumentos'] = $estadoInstrumentos;
            $data['administrativos'] = $administrativos;
            $data['cargoAdministrativos'] = $cargoAdministrativos;
            $data['docentes'] = $docentes;
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

            $prestamo = $this->prestamoRepository->store($request);
            $request['id'] = $prestamo->id;
            $this->detallePrestamoRepository->store($request);
           // $this->instrumentoRepository->reservarInstrumenos($request);

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
            $prestamo = $this->prestamoRepository->find($id);
            $instrumentosDelPrestamo = $this->detallePrestamoRepository->getInstrumentosDeUnPrestamo($id);
            $administrativo = $this->administrativoRepository->getAdministrativo($prestamo->administrativo_id);
            $data['prestamo'] = $prestamo;
            $data['instrumentosDelPrestamo'] = $instrumentosDelPrestamo;
            $data['administrativo'] = $administrativo;
            $data['cliente'] = $this->cliente($prestamo->persona_id);

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($id)
    {
        try {
            $prestamo = $this->prestamoRepository->find($id);
            $instrumentosPrestados = $this->detallePrestamoRepository->getInstrumentosDeUnPrestamo($prestamo->id);
            $todosLosInstrumentosDisponibles = $this->instrumentoRepository->allAvailabre();
            $todosLosEstados = $this->detallePrestamoRepository->getEstados();
            $administrativoQueAtiende = $this->administrativoRepository->getAdministrativo($prestamo->administrativo_id);
            $clientePersona = $this->cliente($prestamo->persona_id); //TODO:me quede aqui

            $data['prestamo'] = $prestamo;
            $data['administrativoQueAtiende'] = $administrativoQueAtiende;
            $data['clientePersona'] = $clientePersona;
            $data['instrumentosPrestados'] = $instrumentosPrestados;
            $data['todosLosInstrumentosDisponibles'] = $todosLosInstrumentosDisponibles;
            $data['todosLosEstados'] = $todosLosEstados;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
//            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->prestamoRepository->update($request, $id);
            $this->detallePrestamoRepository->update($request, $id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::commit();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->detallePrestamoRepository->deleteAll($id);
            $this->prestamoRepository->destroy($id);
            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    /**
     * metodo que nos proporciona al ciente del prestamo, sin importar si es docente o administrativo
     * //TODO:consultar si los encargados de bodega pueden ser clientes, podria lanzarse un caso de excepcion para controlarlo
     * @param integer $id
     * @return mixed
     */
    public function cliente($id)
    {
        if ($this->docenteRepository->esDocente($id))
        {
            return $this->docenteRepository->getDocente($id);
        }
        return $this->administrativoRepository->getAdministrativo($id);
    }
}
