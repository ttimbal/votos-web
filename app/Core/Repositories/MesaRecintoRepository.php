<?php


namespace App\Core\Repositories;


use App\Core\Models\MesaRecinto;
use App\Core\Models\Municipio;
use App\Core\Models\Recinto;


class MesaRecintoRepository
{
    public function all()
    {
        return MesaRecinto::all();
    }

    /**
     * busca un usuario especifico
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return MesaRecinto::findOrFail($id);
    }

    public function allByRecinto($recinto_id){
        $mesaRecinto=MesaRecinto::select('mesa_recinto.*','recinto.id as recinto_id','nombre','direccion')
            ->join('recinto','recinto.id','=','recinto_id')
            ->where('recinto_id',$recinto_id)
            ->get();
        return $mesaRecinto;
    }

    public function update($data)
    {
        $mesa_recinto = MesaRecinto::findOrFail($data['mesa_recinto_id']);
        $mesa_recinto->nulos = $data['nulo'];
        $mesa_recinto->blancos = $data['blanco'];
        $mesa_recinto->con_votos = true;
        $mesa_recinto->save();
    }

    /**
     * metodo que elimina a un usuario ya registrado
     * @param $id
     */
    public function destroy($id)
    {
        MesaRecinto::destroy($id); //metodo que busca y destruye
    }

}
