<?php


namespace App\Core\Business;


use App\Core\Repositories\AdministrativoRepository;
use App\Core\Repositories\PersonaRepository;
use App\Core\Repositories\TelefonoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrativoBusiness
{
    public $administrativoRepository;
    public $personaRepository;
    public $telefonoRepository;

    public function __construct(AdministrativoRepository $administrativoRepository, PersonaRepository $personaRepository,
                                TelefonoRepository $telefonoRepository)
    {
        $this->administrativoRepository = $administrativoRepository;
        $this->personaRepository = $personaRepository;
        $this->telefonoRepository = $telefonoRepository;
    }

    public function index()
    {
        try {
            $administrativos = $this->administrativoRepository->index();
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
            $cargos = $this->administrativoRepository->getCargos();
            $data['cargos'] = $cargos;
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
            $this->administrativoRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($persona_id)
    {
        try {
            $administrativo = $this->administrativoRepository->show($persona_id);
            $data['administrativo'] = $administrativo;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($persona_id)
    {
        try {
            $administrativo = $this->administrativoRepository->show($persona_id);
            $cargos = $this->administrativoRepository->getCargos();
            $data['administrativo'] = $administrativo;
            $data['cargos'] = $cargos;
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
            $this->administrativoRepository->update($request, $persona_id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => true, 'error' => $exception->getMessage()];
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
}
