<?php


namespace App\Core\Repositories;


use App\Core\Models\MesaRecinto;
use App\Core\Models\VotoPostulante;
use App\User;

class VotoPostulanteRepository
{
    public function all()
    {
        return User::all();
    }

    /**
     * busca un usuario especifico
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return User::findOrFail($id);
    }


    public function store($data, $votos)
    {
        foreach ($votos as $voto) {


            $voto_postulante = VotoPostulante::select('*')
                ->where('mesa_recinto_id', $data['mesa_recinto_id'])
                ->where('postulante_id', $voto['id'])->get();
            if ($voto_postulante->isEmpty()) {
                $voto_postulante = new VotoPostulante();
                $voto_postulante->mesa_recinto_id = $data['mesa_recinto_id'];
                $voto_postulante->postulante_id = $voto['id'];
                $voto_postulante->votos = $voto['presidente'];
                $voto_postulante->save();
               // return $voto_postulante;
            } else {
                $voto_postulante = VotoPostulante::select('*')
                    ->where('mesa_recinto_id', $data['mesa_recinto_id'])
                    ->where('postulante_id', $voto['id'])
                    ->update(['votos' => $voto['presidente']]);;
               // $voto_postulante->votos = $voto['presidente'];
               // $voto_postulante->save();
               // return $voto_postulante;
            }
        }
    }

    /**
     * metodo que elimina a un usuario ya registrado
     * @param $id
     */
    public function destroy($id)
    {
        User::destroy($id); //metodo que busca y destruye
    }

}
