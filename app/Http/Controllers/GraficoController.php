<?php

namespace App\Http\Controllers;

use App\Core\Models\MesaRecinto;
use App\Core\Models\Partido;
use App\Core\Models\VotoPostulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $nombresPre = [];
        $nombresDip = [];
        $votosDip = [];
        $votosPre = [];
        $nulos = MesaRecinto::sum('nulos');
        $blancos = MesaRecinto::sum('blancos');
        // foreach ($partidos as $partido) {
        /* $cantidadDeVotos=VotoPostulante::join('postulante','postulante.id','=','voto_postulante.postulante_id')
             ->join('partido','partido.id','=','postulante.id')
             ->where('partido.nombre',$partido->nombre)
             ->where('postulante.cargo','presidente')
             ->get()->sum('votos');*/
        $votos_presidente = DB::select('select partido.nombre,sum(votos) as cantidad_voto from partido,postulante,voto_postulante
                            where partido.id=postulante.partido_id and postulante.id=voto_postulante.postulante_id and postulante.cargo="presidente"
                            group by partido.nombre');

        $votos_diputado = DB::select('select partido.nombre,sum(votos) as cantidad_voto from partido,postulante,voto_postulante
                            where partido.id=postulante.partido_id and postulante.id=voto_postulante.postulante_id and postulante.cargo="diputado"
                            group by partido.nombre');

        $total_votos=DB::select('select sum(votos) as cantidad_voto from partido,postulante,voto_postulante
                            where partido.id=postulante.partido_id and postulante.id=voto_postulante.postulante_id and postulante.cargo="presidente"');

        $tot=0;
        foreach ($total_votos as $total){
            $tot=$total->cantidad_voto+$nulos+$blancos;
        }
        $factor = pow(10, 2);
        foreach ($votos_presidente as $voto_presidente){
            array_push($votosPre, $voto_presidente->cantidad_voto);
            $porcentaje=round((($voto_presidente->cantidad_voto*100)/$tot)*$factor)/$factor;
            array_push($nombresPre,  $voto_presidente->nombre.' - '.((string)$porcentaje).'%');
        }
        foreach ($votos_diputado as $voto_diputado){
            array_push($votosDip, $voto_diputado->cantidad_voto);
            $porcentaje=round((($voto_diputado->cantidad_voto*100)/$tot)*$factor)/$factor;
            array_push($nombresDip,  $voto_diputado->nombre.' - '.((string)$porcentaje).'-%');
        }

        $porcentajeNulo=round((($nulos*100)/$tot)*$factor)/$factor;
        $porcentajeBlanco=round((($blancos*100)/$tot)*$factor)/$factor;

        array_push($votosPre, $porcentajeNulo);
        array_push($nombresPre, 'nulos'.' - '.((string)$porcentajeNulo).'-%');

        array_push($votosPre, $porcentajeBlanco);
        array_push($nombresPre, 'blancos'.' - '.((string)$porcentajeBlanco).'-%');

        array_push($votosDip, $porcentajeNulo);
        array_push($nombresDip, 'nulos'.' - '.((string)$porcentajeNulo).'-%');

        array_push($votosDip, $porcentajeBlanco);
        array_push($nombresDip, 'blancos'.' - '.((string)$porcentajeBlanco).'-%');

        //return $votosPre;
        return view('graficos', [
            'nombres_pre' => $nombresPre,
            'nombres_dip' => $nombresDip,
            'votos_pre' => $votosPre,
            'votos_dip' => $votosDip,
            'votos' => $votos_diputado,
            'total_votos' => $tot
        ]);
    }
}
