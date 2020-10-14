<?php


namespace App\Core\Repositories;


use Spatie\Permission\Models\Permission;

class PermisoRepository
{
    public function all()
    {
        return Permission::all();
    }

    /**
     * carga tambien sus roles por defecto
     * @param $id
     * @return \Spatie\Permission\Contracts\Permission
     */
    public function find($id)
    {
        return Permission::findById($id);
    }

    public function store($data)
    {
        $permiso = new Permission();
        $permiso->name = $data['nombre'];
        $permiso->save(); //retorna un bool
        return $permiso;
    }

    public function storeRoles($data)
    {
        $permiso = $data['permiso'];
        $nuevosRoles = $data['roles'];
        if (!empty($nuevosRoles))
        {
            foreach ($nuevosRoles as $rol)
            {
                $permiso->assignRole($rol);
            }
        }
    }

    public function update($data, $id)
    {
        $permiso = Permission::findById($id);
        $permiso->name = $data['nombre'];
        $permiso->save();
    }

    public function destroy($id)
    {
        $permiso = Permission::findById($id);
        $permiso->delete();
    }

    public function updateRoles($data, $id)
    {
        $permiso = $this->find($id);
        $rolesActuales = $permiso->roles;
        if (!empty($rolesActuales))
        {
            foreach ($rolesActuales as $rol) {
                $permiso->removeRole($rol->name);
            }
        }
        $data['permiso'] = $permiso;
        $this->storeRoles($data);
    }

    public function findUsers(Permission $permission)
    {
        return $permission->users()->get();
    }

    /**
     * metodo que asigna permisos a un usuario especifico
     * @param $data
     */
    public function asignarPermisos($data)
    {
        $usuario = $data['usuario'];
        $usuario->givePermissionTo($data['permisos']);
    }

    /**
     * metodo que actualiza los permisos de un usuario
     * precondicion.- que le envien por la data una instancia de un usuario
     * @param $data
     */
    public function actualizarPermisos($data)
    {
        $usuario = $data['usuario'];
        $usuario->syncPermissions($data['permisos']);  //remueve todos los permisos actuales y le asigna los que le mandamos por parametro(array de permisos)
    }
}
