<?php


namespace App\Core\Repositories;


use App\Core\Models\DetallePromocion;
use Illuminate\Support\Facades\DB;

class DetallePromocionRepository
{
    public function store($data)
    {
        if (! empty($data['promociones_id']))
        {
            $promociones_id = $data['promociones_id'];
            foreach ($promociones_id as $promocion_id)
            {
                $detallePromocion = new DetallePromocion();
                $detallePromocion->materia_sigla = $data['sigla'];
                $detallePromocion->promocion_id = $promocion_id;
                $detallePromocion->save();
            }
        }
    }

    /**
     * metodo que actualiza todos los detalles de promocion
     * Nota.- borra todos los antiguos con sigla e inserta los nuevos que estan en la data
     * @param $data
     * @param $sigla
     */
    public function update($data, $sigla)
    {
        $this->deleteAll($sigla);
        $this->store($data);
    }

    /**
     * metodo que borra todos los detalles que le pertenezcan a esa sigla
     * @param $sigla
     */
    public function deleteAll($sigla)
    {
        DB::table('detalle_promociones')
            ->where('materia_sigla', $sigla)
            ->delete();
    }
}
