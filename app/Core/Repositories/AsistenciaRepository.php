<?php


namespace App\Core\Repositories;


use App\Core\Models\Asistencia;

class AsistenciaRepository
{
    // estados de las asistencias
    static $permiso = 'P';
    static $falta = 'F';
    static $asistencia = 'A';

    public function all()
    {
        return Asistencia::all();
    }

    public function find($id)
    {
        return Asistencia::findOrFail($id);
    }

    public function store($data)
    {
        $asistencia = new Asistencia();
        $asistencia->fecha = $data['fecha'];
        $asistencia->estado = $data['estado'];
        $asistencia->persona_id = $data['persona_id'];
        $asistencia->save();
        return $asistencia;
    }

    public function update($data, $id)
    {
        $asistencia = $this->find($id);
        $asistencia->fecha = $data['fecha'];
        $asistencia->estado = $data['estado'];
        $asistencia->persona_id = $data['persona_id'];
        $asistencia->save();
        return $asistencia;
    }

    public function destroy($id)
    {
        $asistencia = $this->find($id);
        return $asistencia->delete();
    }
}
