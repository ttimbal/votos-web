<?php


namespace App\Core\Business;


use App\Core\Repositories\AdministrativoRepository;
use App\Core\Repositories\AsistenciaRepository;
use App\Core\Repositories\DocenteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaBusiness
{
    protected $asistenciaRepository;
    protected $administrativoRepository;
    protected $docenteRepository;

    public function __construct(AsistenciaRepository $asistenciaRepository,
                                AdministrativoRepository $administrativoRepository,
                                DocenteRepository $docenteRepository)
    {
        $this->asistenciaRepository = $asistenciaRepository;
        $this->administrativoRepository = $administrativoRepository;
        $this->docenteRepository = $docenteRepository;
    }

    public function index()
    {
        try {
            $asistencias = $this->asistenciaRepository->all();
            $administrativos = $this->administrativoRepository->all();
            $asistencias->load('persona');
            $data['asistencias'] = $asistencias;
            $data['administrativos'] = $administrativos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $docentes = $this->docenteRepository->all();
            $docentes->load('persona');
            $administrativos = $this->administrativoRepository->all();
            $administrativos->load('persona');
            $data['docentes'] = $docentes;
            $data['administrativos'] = $administrativos;
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

            $this->asistenciaRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($id)
    {
        try {
            $asistencia = $this->asistenciaRepository->find($id);
            $asistencia->load('persona');
            $administrativo = $this->administrativoRepository->buscar($asistencia->persona_id);
            $data['asistencia'] = $asistencia;
            $data['administrativo'] = $administrativo;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($id)
    {
        try {
            $asistencia = $this->asistenciaRepository->find($id);
            $docentes = $this->docenteRepository->all();
            $docentes->load('persona');
            $administrativos = $this->administrativoRepository->all();
            $administrativos->load('persona');
            $data['asistencia'] = $asistencia;
            $data['docentes'] = $docentes;
            $data['administrativos'] = $administrativos;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->asistenciaRepository->update($request, $id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $this->asistenciaRepository->destroy($id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
