<?php


namespace App\Core\Business;


use App\Core\Repositories\PersonaRepository;
use App\Core\Repositories\ProveedorRepository;
use App\Core\Repositories\TelefonoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorBusiness
{
    protected $proveedorRepository;
    protected $personaRepository;
    protected $telefonoRepository;

    public function __construct(ProveedorRepository $proveedorRepository, PersonaRepository $personaRepository,
                                TelefonoRepository $telefonoRepository)
    {
        $this->proveedorRepository = $proveedorRepository;
        $this->personaRepository = $personaRepository;
        $this->telefonoRepository = $telefonoRepository;
    }

    public function index()
    {
        try {
            $proveedores = $this->proveedorRepository->index();
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

            $persona = $this->personaRepository->store($request);
            $request['id'] = $persona->id;
            $this->telefonoRepository->store($request);
            $this->proveedorRepository->store($request);

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
            $proveedor = $this->proveedorRepository->show($persona_id);
            $data['proveedor'] = $proveedor;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($persona_id)
    {
        try {
            $proveedor = $this->proveedorRepository->show($persona_id);
            $data['proveedor'] = $proveedor;
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
            $this->proveedorRepository->update($request, $persona_id);

            DB::commit();
            return ['success' => true];
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
}
