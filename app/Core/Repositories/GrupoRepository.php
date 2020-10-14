<?php


namespace App\Core\Repositories;


use App\Core\Models\Grupo;

class GrupoRepository
{
    public function all()
    {
        return Grupo::all();
    }

    public function find($id)
    {
        return Grupo::findOrFail($id);
    }

    public function store($data)
    {
        $grupo = new Grupo();
        $grupo->nombre = $data['grupo_nombre'];
        $grupo->docente_id = $data['docente_id'];
        $grupo->materia_sigla = $data['materia_sigla'];
        $grupo->periodo_codigo = $data['periodo_codigo'];
        $grupo->save();
        return $grupo;
    }

    public function update($data, $id)
    {
        $grupo = $this->find($id);
        $grupo->nombre = $data['grupo_nombre'];
        $grupo->docente_id = $data['docente_id'];
        $grupo->materia_sigla = $data['materia_sigla'];
        $grupo->periodo_codigo = $data['periodo_codigo'];
        $grupo->save();
        return $grupo;
    }

    public function destroy($id)
    {
        $grupo = $this->find($id);
        return $grupo->delete();
    }

    public function findForMateria($sigla)
    {
        return Grupo::where('materia_sigla',$sigla)->get();
    }
}
