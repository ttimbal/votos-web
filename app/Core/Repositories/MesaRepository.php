<?php


namespace App\Core\Repositories;



use App\Core\Models\Mesa;

class MesaRepository
{
    public function all()
    {
        return Mesa::all();
    }



    public function find($id)
    {
        return Mesa::findOrFail($id);
    }


    public function store($data)
    {
       /* $persona =$data['persona'];
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
        Mesa::destroy($id); //metodo que busca y destruye
    }

}
