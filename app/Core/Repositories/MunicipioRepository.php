<?php


namespace App\Core\Repositories;




use App\Core\Models\Municipio;

class MunicipioRepository
{
    public function all()
    {
        return Municipio::all();
    }
    public function allWithAsiento()
    {
        return Municipio::all()->load('asientos');
    }

    /**
     * busca un usuario especifico
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Municipio::findOrFail($id);
    }

    /**
     * metodo que crea un nuevo usuario
     * @param $data
     * @return User
     */
    public function store($data)
    {
        /*$persona =$data['persona'];
        $usuario = new User();
        $usuario->name = $persona->nombre;
        $usuario->email = $persona->correo;
        $usuario->password = bcrypt($data['password']);
        $usuario->persona_id = $persona->id;
        $usuario->save();
        return $usuario;*/
    }

    /**
     * metodo que elimina a un usuario ya registrado
     * @param $id
     */
    public function destroy($id)
    {
        //User::destroy($id); //metodo que busca y destruye
    }

}
