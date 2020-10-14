<?php


namespace App\Core\Repositories;


use App\Core\Models\Promocion;
use Illuminate\Support\Facades\DB;

class PromocionRepository
{
    public function all()
    {
        return Promocion::all();
    }

    public function find($id)
    {
        return Promocion::findOrFail($id);
    }

    public function store($data)
    {
        $promocion = new Promocion();
        $promocion->nombre = $data['nombre'];
        $promocion->fecha_inicio = $data['fecha_inicio'];
        $promocion->fecha_fin = $data['fecha_fin'];
        $promocion->descuento = $data['descuento'];
        $promocion->save();
        return $promocion;
    }

    public function update($data, $id)
    {
        $promocion = $this->find($id);
        $promocion->nombre = $data['nombre'];
        $promocion->fecha_inicio = $data['fecha_inicio'];
        $promocion->fecha_fin = $data['fecha_fin'];
        $promocion->descuento = $data['descuento'];
        $promocion->save();
    }

    public function destroy($id)
    {
        $promocion = $this->find($id);
        return $promocion->delete();
    }

    /**
     * metodo que proporciona todas las promociones de una sigla determinada
     * @param $sigla
     */
    public function promociones($sigla)
    {
        return DB::select('SELECT * FROM detalle_promociones,promociones WHERE promocion_id = id and materia_sigla = :sigla', ['sigla' => $sigla]);
    }
}
