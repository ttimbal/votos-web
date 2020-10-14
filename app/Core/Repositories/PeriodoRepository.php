<?php


namespace App\Core\Repositories;


use App\Core\Models\Periodo;

class PeriodoRepository
{
    public function all()
    {
        return Periodo::all();
    }

    public function find($codigo)
    {
        return Periodo::findOrfail($codigo);
    }

    public function store($data)
    {
        $periodo = new Periodo();
        $periodo->nombre = $data['nombre'];
        $periodo->fecha_inicio = $data['fecha_inicio'];
        $periodo->fecha_fin = $data['fecha_fin'];
        $periodo->save();
        return $periodo;
    }

    public function update($data, $codigo)
    {
        $periodo = $this->find($codigo);
        $periodo->nombre = $data['nombre'];
        $periodo->fecha_inicio = $data['fecha_inicio'];
        $periodo->fecha_fin = $data['fecha_fin'];
        $periodo->save();
        return $periodo;
    }

    public function destroy($codigo)
    {
        $periodo = $this->find($codigo);
        return $periodo->delete();
    }
}
