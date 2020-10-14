<?php


namespace App\Core\Business;


use App\Core\Repositories\DocenteRepository;
use App\Core\Repositories\GrupoHorarioRepository;
use App\Core\Repositories\GrupoRepository;
use App\Core\Repositories\HorarioRepository;
use App\Core\Repositories\MateriaRepository;
use App\Core\Repositories\PeriodoRepository;
use App\Core\Repositories\PersonaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoBusiness
{
    protected $grupoRepository;
    protected $personaRepository;
    protected $periodoRepository;
    protected $horarioRepository;
    protected $materiaRepository;
    protected $docenteRepository;
    protected $grupoHorarioRepository;

    public function __construct(GrupoRepository $grupoRepository,
                                PersonaRepository $personaRepository,
                                PeriodoRepository $periodoRepository,
                                HorarioRepository $horarioRepository,
                                MateriaRepository $materiaRepository,
                                DocenteRepository $docenteRepository,
                                GrupoHorarioRepository $grupoHorarioRepository)
    {
        $this->grupoRepository = $grupoRepository;
        $this->personaRepository = $personaRepository;  //se usara para sacar el nombre del docente
        $this->periodoRepository = $periodoRepository;
        $this->horarioRepository = $horarioRepository;
        $this->materiaRepository = $materiaRepository;
        $this->docenteRepository = $docenteRepository;
        $this->grupoHorarioRepository = $grupoHorarioRepository;
    }

    public function index()
    {
        try {
            $grupos = $this->grupoRepository->all();
            foreach ($grupos as $grupo)
            {
                $grupo->docente = $this->personaRepository->find($grupo->docente_id);
                $grupo->materia = $this->materiaRepository->find($grupo->materia_sigla);
                $grupo->periodo = $this->periodoRepository->find($grupo->periodo_codigo);
                $grupo->horarios = $this->horarioRepository->horarios($grupo->id);
            }
            $data['grupos'] = $grupos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $horarios = $this->horarioRepository->all();
            $periodos = $this->periodoRepository->all();
            $materias = $this->materiaRepository->all();
            $docentes = $this->docenteRepository->all();
            $docentes->load('persona');
            $data['horarios'] = $horarios;
            $data['periodos'] = $periodos;
            $data['materias'] = $materias;
            $data['docentes'] = $docentes;
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

            $grupo = $this->grupoRepository->store($request);
            $request['grupo_id'] = $grupo->id;
            $this->grupoHorarioRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($id)
    {
        try {
            $grupo = $this->grupoRepository->find($id);
            $docente = $this->personaRepository->find($grupo->docente_id);
            $materia = $this->materiaRepository->find($grupo->materia_sigla);
            $periodo = $this->periodoRepository->find($grupo->periodo_codigo);
            $horarios = $this->horarioRepository->horarios($grupo->id);
            $data['grupo'] = $grupo;
            $data['docente'] = $docente;
            $data['materia'] = $materia;
            $data['periodo'] = $periodo;
            $data['horarios'] = $horarios;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($id)
    {
        try {
            $grupo = $this->grupoRepository->find($id);
            $grupo_horarios = $this->grupoHorarioRepository->getHorariosId($grupo->id);
            $docentes = $this->docenteRepository->all();
            $docentes->load('persona');
            $materias = $this->materiaRepository->all();
            $periodos = $this->periodoRepository->all();
            $horarios = $this->horarioRepository->all();
            $data['grupo'] = $grupo;
            $data['grupo_horarios'] = $grupo_horarios;
            $data['docentes'] = $docentes;
            $data['materias'] = $materias;
            $data['periodos'] = $periodos;
            $data['horarios'] = $horarios;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->grupoRepository->update($request, $id);
            $request['grupo_id'] = $id;
            $this->grupoHorarioRepository->update($request, $id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $this->grupoRepository->destroy($id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function indexApi($sigla)
    {
        try {
            $grupos = $this->grupoRepository->findForMateria($sigla);
            foreach ($grupos as $grupo)
            {
                $grupo->docente = $this->personaRepository->find($grupo->docente_id);
                $grupo->materia = $this->materiaRepository->find($grupo->materia_sigla);
                $grupo->periodo = $this->periodoRepository->find($grupo->periodo_codigo);
                $grupo->horarios = $this->horarioRepository->horarios($grupo->id);
            }
            $data['grupos'] = $grupos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
