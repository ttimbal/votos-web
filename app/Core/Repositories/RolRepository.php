<?php


namespace App\Core\Repositories;

use Spatie\Permission\Models\Role;

class RolRepository
{
    /**
     * metodo que proporciona todos los Roles
     * @return \Illuminate\Database\Eloquent\Collection|Role[]
     */
    public function all()
    {
        return Role::all();
    }

    /**
     * metodo que busca un Rol
     * @param $id
     * @return \Spatie\Permission\Contracts\Role
     */
    public function find($id)
    {
        return Role::findById($id);
    }

    /**
     * metodo que crea y guarda un nuevo Rol
     * @param $data
     * @return Role
     */
    public function store($data)
    {
        $rol = new Role();
        $rol->name = $data['nombre'];
        $rol->save();
        return $rol;
    }

    /**
     * metodo que guarda los permisos que se le asignaron a este Rol
     * @param $data
     */
    public function storePermisos($data)
    {
        $rol = $data['rol'];
        $nuevosPermisos = $data['permisos'];
        if (!empty($nuevosPermisos))
        {
            foreach ($nuevosPermisos as $permiso)
            {
                $rol->givePermissionTo($permiso);
            }
        }
    }

    /**
     * metodo que actualiza los datos de un Rol ya existente
     * @param $data
     * @param $id
     */
    public function update($data, $id)
    {
        $rol = $this->find($id);
        $rol->name = $data['nombre'];
        $rol->save();
    }

    /**
     * metodo que elimina un Rol existente
     * @param $id
     */
    public function destroy($id)
    {
        $rol = $this->find($id);
        $rol->delete();
    }

    /**
     * metodo para actualizar los permisos de un Rol determinado
     * @param $data
     * @param $id
     */
    public function updatePermissions($data, $id)
    {
        $rol = $this->find($id);
        $rol->getAllPermissions();
        $permisosActuales = $rol->permissions;
        if (!empty($permisosActuales))
        {
            foreach ($permisosActuales as $permission)
            {
                $rol->revokePermissionTo($permission->name);
            }
        }
        $data['rol'] = $rol;
        $this->storePermisos($data);
    }

    /**
     * metodo que busca los usuarios del rol proporcionado
     * @param Role $role
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsers(Role $role)
    {
        return $role->users()->get();
    }

    /**
     * metodo para asignar roles a un usuario en especifico
     * @param $data
     */
    public function asignarRol($data)
    {
        $usuario = $data['usuario'];
        $usuario->assignRole($data['roles']);
    }

    /**
     * metodo que actualiza los roles de un usuario
     * precondicion.- que le envien por la data una instancia de un usuario
     * @param $data
     */
    public function actualizarRol($data)
    {
        $usuario = $data['usuario'];
        $usuario->syncRoles($data['roles']);  //remueve todos los roles actuales y le asigna los que le mandamos por parametro(array de roles)
    }
}
