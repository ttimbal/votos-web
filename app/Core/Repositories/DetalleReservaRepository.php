<?php


namespace App\Core\Repositories;


use App\Core\Models\DetalleReserva;
use Illuminate\Support\Facades\DB;

class DetalleReservaRepository
{
    //traits
    use EstadoTrait;

    /**
     * metodo para guardar todos los detalles de prestamos
     * Precondicion:se debera de enviar el id del prestamo
     * @param $data
     */
    public function store($data)
    {
        foreach ($data['check_reserva'] as $id_instrumento)
        {
            $detalle = new DetalleReserva(); //TODO: tambien se deberia cambiar el estado del instrumento, con un boolean que diga prestado o algo asi
            $detalle->reserva_id = $data['reserva_id'];
            $detalle->instrumento_numero = $id_instrumento;
            $detalle->save();
        }
    }




    /**
     * metodo que elimina todos los instrumentos que le pertenecen a ese id de prestamo
     * @param $prestamo_id
     */
    public function deleteAll($reserva_id)
    {
        return DB::select("call borrar_detalle_reserva(?)",array($reserva_id));
    }


    public function getTodosLosNumerosDeInstrumentosDeUnaReserva($reserva_id)
    {
        return DetalleReserva::select('instrumentos.*','nombre_instrumentos.nombre')
            ->where('detalle_reservas.reserva_id', $reserva_id)
            ->join('instrumentos', 'detalle_reservas.instrumento_numero', '=', 'instrumentos.numero')
            ->join('nombre_instrumentos', 'instrumentos.nombre_instrumento_id', '=', 'nombre_instrumentos.id')
            ->get();
    }




}
