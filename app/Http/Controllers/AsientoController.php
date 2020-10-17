<?php

namespace App\Http\Controllers;

use App\Core\Business\AsientoBusiness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsientoController extends Controller
{
    protected $asientoBusiness;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AsientoBusiness $asientoBusiness)
    {
        $this->asientoBusiness=$asientoBusiness;
    }
    public function index($municipio_id)
    {
        $asientos= $this->asientoBusiness->asientosByMunicipio($municipio_id);
        $votos_presidente=DB::select('select partido.nombre,sum(votos) as cantidad_voto from  municipio,asiento,recinto,mesa_recinto,postulante,voto_postulante,partido
                            where municipio.id=asiento.municipio_id and municipio_id='.$municipio_id.' and asiento.id=recinto.asiento_id
                              and mesa_recinto.recinto_id=recinto.id and voto_postulante.mesa_recinto_id=mesa_recinto.id
                              and postulante.id=voto_postulante.postulante_id and partido.id=postulante.partido_id
                              and postulante.cargo="presidente"
                            group by partido.nombre');
        $votos_diputado=DB::select('select partido.nombre,sum(votos) as cantidad_voto from  municipio,asiento,recinto,mesa_recinto,postulante,voto_postulante,partido
                            where municipio.id=asiento.municipio_id and municipio_id='.$municipio_id.' and asiento.id=recinto.asiento_id
                              and mesa_recinto.recinto_id=recinto.id and voto_postulante.mesa_recinto_id=mesa_recinto.id
                              and postulante.id=voto_postulante.postulante_id and partido.id=postulante.partido_id
                              and postulante.cargo="diputado"
                            group by partido.nombre');
        $blanco_nulo=DB::select('select sum(nulos) as nulos,sum(blancos) as blancos from municipio,asiento,recinto,mesa_recinto
                    where municipio.id=asiento.municipio_id and municipio_id='.$municipio_id.' and asiento.id=recinto.asiento_id
                      and mesa_recinto.recinto_id=recinto.id ;');
        $total=0;

        foreach ($votos_presidente as $voto){
            $total=$total+$voto->cantidad_voto;
        }
        foreach ($blanco_nulo as $voto) {
            $total=$total+$voto->nulos+$voto->blancos;
        }
        //return $total;
        //return $votos_diputado;
       // return $asientos['data']['asientos'];
        return view('asiento', [
            'asientos' => $asientos['data']['asientos'],
            'votos_presidente' => $votos_presidente,
            'votos_diputado' => $votos_diputado,
            'total' => $total,
            'blanco_nulo' => $blanco_nulo
        ]);
    }
}
