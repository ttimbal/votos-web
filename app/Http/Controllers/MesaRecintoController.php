<?php

namespace App\Http\Controllers;

use App\Core\Business\MesaRecintoBusiness;
use App\Core\Models\Partido;
use App\Core\Models\VotoPostulante;
use App\Http\Requests\VotosStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaRecintoController extends Controller
{
    protected $mesaRecintoBusiness;

    public function __construct(MesaRecintoBusiness $mesaRecintoBusiness)
    {
        $this->mesaRecintoBusiness=$mesaRecintoBusiness;
    }
    public function index($recinto_id)
    {


        $mesaRecinto= $this->mesaRecintoBusiness->index($recinto_id);
        $votos_presidente=DB::select('select partido.nombre,sum(votos) as cantidad_voto from  recinto,mesa_recinto,postulante,voto_postulante,partido
                            where recinto.id='.$recinto_id.' and mesa_recinto.recinto_id=recinto.id and voto_postulante.mesa_recinto_id=mesa_recinto.id
                              and postulante.id=voto_postulante.postulante_id and partido.id=postulante.partido_id
                              and postulante.cargo="presidente"
                            group by partido.nombre;');
        $votos_diputado=DB::select('select partido.nombre,sum(votos) as cantidad_voto from  recinto,mesa_recinto,postulante,voto_postulante,partido
                            where recinto.id='.$recinto_id.' and mesa_recinto.recinto_id=recinto.id and voto_postulante.mesa_recinto_id=mesa_recinto.id
                              and postulante.id=voto_postulante.postulante_id and partido.id=postulante.partido_id
                              and postulante.cargo="diputado"
                            group by partido.nombre;');
        $blanco_nulo=DB::select('select sum(nulos) as nulos,sum(blancos) as blancos from recinto,mesa_recinto
                    where  recinto.id='.$recinto_id.' and mesa_recinto.recinto_id=recinto.id;');
        $total=0;

        foreach ($votos_presidente as $voto){
            $total=$total+$voto->cantidad_voto;
        }
        foreach ($blanco_nulo as $voto) {
            $total=$total+$voto->nulos+$voto->blancos;
        }
        //return $mesaRecinto;
         //return $mesaRecinto['data']['mesa_recinto'];
        return view('mesa', [
            'mesaRecinto' => $mesaRecinto['data']['mesa_recinto'],
            'partidos' => $mesaRecinto['data']['partidos'],
            'votos_presidente' => $votos_presidente,
            'votos_diputado' => $votos_diputado,
            'total' => $total,
            'blanco_nulo' => $blanco_nulo
        ]);
    }
    public function store(VotosStoreRequest $request,$recinto_id)
    {

       // return $request;
       // return  VotoPostulante::find([1, 2, 3]);
            //->where('postulante_id', $voto['id'])

        $respuesta = $this->mesaRecintoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('mesas',$recinto_id);
            //return 'hecho';
            //return redirect()->route('administrativos.index');
        }
        echo $respuesta['error'];
        return $request;
        //return back()->withErrors($respuesta['error']);
    }
}
