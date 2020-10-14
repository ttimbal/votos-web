<?php


namespace App\Core\Repositories;

use App\Core\Models\Telefono;
use Illuminate\Support\Facades\DB;

class TelefonoRepository
{
    public function all()
    {
        return Telefono::all();
    }

    /**
     * metodo que guarda los telefonos pertenecientes a una persona
     * Precondicion:se debera de mandar el id de la persona
     * @param $data
     */
    public function store($data)
    {
        $telefonos = $data['telefonos'];
        foreach ($telefonos as $telefonoActual) {
            $telefono = new Telefono();
            $telefono->persona_id = $data['id'];
            $telefono->numero = $telefonoActual;
            $telefono->save();
        }
        return $telefonos;
    }

    public function update($data, $persona_id)
    {
        $this->deleteAll($persona_id);
        $telefonos = $this->store($data);
        return $telefonos;
    }

    /**
     * metodo que borra todos los telefonos pertenecientes a la persona_id
     * @param $persona_id
     */
    public function deleteAll($persona_id)
    {
        DB::table('telefonos')
            ->where('persona_id', $persona_id)
            ->delete();
    }
}
