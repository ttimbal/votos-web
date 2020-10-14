<?php


namespace App\Core\Repositories;


use App\Core\Models\Persona;

class PersonaRepository
{
    public function find($id)
    {
        return Persona::findOrFail($id);
    }

    public function all()
    {
        return Persona::all();
    }

    public function store($data)
    {
        $persona = new Persona();
        $persona->nombre = $data['nombre'];
        $persona->direccion = $data['direccion'];
        if (empty($data['activo'])) {
            $persona->activo = 0;
        } else {
            $persona->activo = 1;
        }
        $persona->correo = $data['correo'];
        $persona->ci_nit = $data['ci_nit'];
        $persona->save();
        return $persona;
    }

    public function update($data, $id)
    {
        $persona = $this->find($id);
        $persona->nombre = $data['nombre'];
        $persona->direccion = $data['direccion'];
        $persona->correo = $data['correo'];
        $persona->ci_nit = $data['ci_nit'];

        if (empty($data['activo'])) {
            $persona->activo = 0;
        } else {
            $persona->activo = 1;
        }

        $persona->save();
        return $persona;
    }

    public function destroy($id)
    {
        $persona = $this->find($id);
        $persona->delete(); //retorna un bool
    }
}
