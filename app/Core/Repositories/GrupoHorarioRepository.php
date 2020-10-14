<?php


namespace App\Core\Repositories;


use App\Core\Models\GrupoHorario;
use Illuminate\Support\Facades\DB;

class GrupoHorarioRepository
{
    public function store($data)
    {
        $horarios_id = $data['horarios_id'];
        foreach ($horarios_id as $horario_id)
        {
            $grupoHorario = new GrupoHorario();
            $grupoHorario->grupo_id = $data['grupo_id'];
            $grupoHorario->horario_id = $horario_id;
            $grupoHorario->save();
        }
    }

    public function update($data, $grupo_id)
    {
        $this->deleteAll($grupo_id);
        $this->store($data);
    }

    /**
     * metodo que borra todos los grupoHorario que le pertenezcan a ese grupo_id
     * @param $grupo_id
     */
    public function deleteAll($grupo_id)
    {
        DB::table('grupo_horarios')
            ->where('grupo_id', $grupo_id)
            ->delete();
    }

    /**
     * metodo que proporciona las tuplas pertenecientes a un id de grupo especifico
     * @param $grupo_id
     * @return mixed
     */
    public function getHorariosId($grupo_id)
    {
        return GrupoHorario::where('grupo_id',$grupo_id)->get();
    }
}
