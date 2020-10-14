<?php


namespace App\Core\Business;


use App\Core\Repositories\PermisoRepository;
use App\Core\Repositories\RolRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolBusiness
{
    protected $rolRepository;
    protected $permisoRepository;

    public function __construct(RolRepository  $rolRepository,
                                PermisoRepository $permisoRepository)
    {
        $this->rolRepository = $rolRepository;
        $this->permisoRepository = $permisoRepository;
    }

    public function index()
    {
        try {
            $roles = $this->rolRepository->all();
            foreach ($roles as $rol)
            {
                $rol->getAllPermissions();
            }
            $data['roles'] = $roles;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $todosLosPermisos = $this->permisoRepository->all();
            $data['todosLosPermisos'] = $todosLosPermisos;

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

            $request['rol'] = $this->rolRepository->store($request);
            $this->rolRepository->storePermisos($request);

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
            $rol = $this->rolRepository->find($id);
            $rol->getAllPermissions();;
            $usuarios = $this->rolRepository->findUsers($rol);
            $data['rol'] = $rol;
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
            $rol = $this->rolRepository->find($id);
            $rol->getAllPermissions();
            $todosLosPermisos = $this->permisoRepository->all();
            $data['rol'] = $rol;
            $data['todosLosPermisos'] = $todosLosPermisos;

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

            $this->rolRepository->update($request, $id);
            $this->rolRepository->updatePermissions($request, $id);

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

            $this->rolRepository->destroy($id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
