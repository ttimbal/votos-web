<?php


namespace App\Core\Repositories;


use App\Core\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservaRepository
{
    public function all()
    {
        return Reserva::all();
    }
    public function find($id)
    {
        return Reserva::findOrFail($id);
    }

    public function index()
    {
        $reserva = $this->all();
        return $reserva;
    }

    public function store($data)
    {
        $reserva = new Reserva();
        $reserva->fecha = now('America/La_Paz')->toDateString();
        $reserva->hora = now('America/La_Paz')->toTimeString();
        $reserva->fecha_recoger = $data['fecha'];
        $reserva->hora_recoger = $data['hora'];
        $reserva->prestamo_realizado = false;
        $reserva->docente_id = Auth::user()->id;
        $reserva->save();
        return $reserva;
    }
    public function destroy($id)
    {
        Reserva::destroy($id);
    }
}
