<?php


namespace App\Core\Business;


use App\Core\Repositories\PermisoRepository;
use App\Core\Repositories\RolRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermisoBussines
{
    protected $permisoRepository;
    protected $rolRepository;

    public function __construct(PermisoRepository $permisoRepository,
                                RolRepository $rolRepository)
    {
        $this->permisoRepository = $permisoRepository;
        $this->rolRepository = $rolRepository;
    }

    public function index()
    {
        try {
            $permisos = $this->permisoRepository->all();
            foreach ($permisos as $permiso)
            {
                $permiso->getRoleNames();
            }
            $data['permisos'] = $permisos;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $todosLosRoles = $this->rolRepository->all();
            $data['todosLosRoles'] = $todosLosRoles;

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

            $request['permiso'] = $this->permisoRepository->store($request);
            $this->permisoRepository->storeRoles($request);

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
            $permiso = $this->permisoRepository->find($id);
            $usuarios = $this->permisoRepository->findUsers($permiso);
            $data['permiso'] = $permiso;
            $data['usuarios'] = $usuarios;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($id)
    {
        try {
            $permiso = $this->permisoRepository->find($id); //carga los roles por defecto
            $todosLosRoles = $this->rolRepository->all();
            $data['permiso'] = $permiso;
            $data['todosLosRoles'] = $todosLosRoles;

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

            $this->permisoRepository->update($request, $id);
            $this->permisoRepository->updateRoles($request, $id);

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

            $this->permisoRepository->destroy($id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
