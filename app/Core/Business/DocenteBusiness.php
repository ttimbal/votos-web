<?php


namespace App\Core\Business;


use App\Core\Repositories\DocenteRepository;
use App\Core\Repositories\EspecialidadRepository;
use App\Core\Repositories\PersonaRepository;
use App\Core\Repositories\TelefonoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteBusiness
{
    protected $docenteRepository;
    protected $especialidadRepository;
    protected $personaRepository;
    protected $telefonoRepository;

    public function __construct(DocenteRepository $docenteRepository, EspecialidadRepository $especialidadRepository,
                                PersonaRepository $personaRepository, TelefonoRepository $telefonoRepository)
    {
        $this->docenteRepository = $docenteRepository;
        $this->especialidadRepository = $especialidadRepository;
        $this->personaRepository = $personaRepository;
        $this->telefonoRepository = $telefonoRepository;
    }

    public function index()
    {
        try {
            $docentes = $this->docenteRepository->index();
            foreach ($docentes as $docente)
            {
                $docente->especialidades = $this->especialidadRepository->especialidades($docente->persona_id);
            }
            $data['docentes'] = $docentes;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $especialidades = $this->especialidadRepository->all();
            $data['especialidades'] = $especialidades;
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

            $persona = $this->personaRepository->store($request);
            $request['id'] = $persona->id;
            $this->telefonoRepository->store($request);
            $this->docenteRepository->store($request);
            $this->especialidadRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($persona_id)
    {
        try {
            $docente = $this->docenteRepository->show($persona_id);
            $docente->especialidades = $this->especialidadRepository->especialidades($persona_id);
            $data['docente'] = $docente;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($persona_id)
    {
        try {
            $docente = $this->docenteRepository->show($persona_id);
            $docente->especialidades = $this->especialidadRepository->especialidades($persona_id);
            $especialidades = $this->especialidadRepository->all();
            $data['docente'] = $docente;
            $data['especialidades'] = $especialidades;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $persona_id)
    {
        try {
            DB::beginTransaction();

            $this->personaRepository->update($request, $persona_id);
            $request['id'] = $persona_id; //es necesario para los otros metodos
            $this->telefonoRepository->update($request, $persona_id);
            $this->especialidadRepository->update($request, $persona_id);
            $this->docenteRepository->update($request, $persona_id);

            DB::commit();
            return ['success' => true]; //TODO:no envie la data por que no la necesite
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($persona_id)
    {
        try {
            DB::beginTransaction();

            $this->personaRepository->destroy($persona_id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function indexApi()
    {
        try {
            $docentes = $this->docenteRepository->indexApi();
            foreach ($docentes as $docente)
            {
                $docente->especialidades = $this->especialidadRepository->especialidades($docente->persona_id);
            }
            $data['docentes'] = $docentes;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

}
