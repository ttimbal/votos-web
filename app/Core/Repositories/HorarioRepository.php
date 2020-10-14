<?php


namespace App\Core\Repositories;


use App\Core\Models\Horario;
use Illuminate\Support\Facades\DB;

class HorarioRepository implements DiaInterface
{
    public function all()
    {
        return Horario::all();
    }

    public function find($id)
    {
        return Horario::findOrFail($id);
    }

    public function store($data)
    {
        $horario = new Horario();
        $horario->dia = $data['dia'];
        $horario->hora_inicio = $data['hora_inicio'];
        $horario->hora_fin = $data['hora_fin'];
        $horario->save();
        return $horario;
    }

    public function update($data, $id)
    {
        $horario = $this->find($id);
        $horario->dia = $data['dia'];
        $horario->hora_inicio = $data['hora_inicio'];
        $horario->hora_fin = $data['hora_fin'];
        $horario->save();
        return $horario;
    }

    public function destroy($id)
    {
        $horario = $this->find($id);
        return $horario->delete();
    }

    public function getDias()
    {
        return [
            self::LUNES,
            self::MARTES,
            self::MIERCOLES,
            self::JUEVES,
            self::VIERNES,
            self::SABADO,
            self::DOMINGO
        ];
    }

    /**
     * metodo que proporciona todos los horarios de un grupo especificado
     * @param $grupo_id
     * @return array
     */
    public function horarios($grupo_id)
    {
        return DB::select('SELECT id,dia,hora_inicio,hora_fin FROM grupo_horarios,horarios WHERE horario_id = id and grupo_id = :grupo_id', ['grupo_id' => $grupo_id]);;
    }
}
