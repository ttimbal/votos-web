<?php


namespace App\Core\Business;


use App\Core\Models\Docente;
use App\Core\Models\Partido;
use App\Core\Repositories\AdministrativoRepository;
use App\Core\Repositories\MesaRecintoRepository;
use App\Core\Repositories\MesaRepository;
use App\Core\Repositories\PermisoRepository;
use App\Core\Repositories\PersonaRepository;
use App\Core\Repositories\PostulanteRepository;
use App\Core\Repositories\RecintoRepository;
use App\Core\Repositories\RolRepository;
use App\Core\Repositories\UsuarioRepository;
use App\Core\Repositories\VotoPostulanteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaRecintoBusiness
{
    protected $mesaRecintoRepository;
    protected $postulanteRepository;
    protected $votoPostulanteRepository;


    public function __construct(MesaRecintoRepository $mesaRecintoRepository,
PostulanteRepository $postulanteRepository,
VotoPostulanteRepository $votoPostulanteRepository)
    {
        $this->mesaRecintoRepository=$mesaRecintoRepository;
        $this->postulanteRepository=$postulanteRepository;
        $this->votoPostulanteRepository=$votoPostulanteRepository;
    }

    public function index($recinto_id)
    {
        try {
            $mesaRecinto = $this->mesaRecintoRepository->allByRecinto($recinto_id);
            //return $mesaRecinto;
            $data['mesa_recinto'] = $mesaRecinto;
            $data['partidos'] = Partido::all();
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }


    public function create()
    {
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $partidos=Partido::all()->load('postulantes');
            $votos=[];
            foreach ($partidos as $partido){
                $partido_actual['presidente']=$request['pre_'.strtolower(substr($partido->nombre,0,3))];
                $partido_actual['diputado']=$request['dip_'.strtolower(substr($partido->nombre,0,3))];
                $partido_actual['id']=$partido->postulantes[0]['id'];
                $partido_actual['tag']=1;

                $partido_actual1['presidente']=$request['pre_'.strtolower(substr($partido->nombre,0,3))];
                $partido_actual1['diputado']=$request['dip_'.strtolower(substr($partido->nombre,0,3))];
                $partido_actual1['id']=$partido->postulantes[1]['id'];
                $partido_actual1['tag']=2;



                array_push ( $votos,$partido_actual);
                array_push ( $votos,$partido_actual1);
            }
            $this->votoPostulanteRepository->store($request,$votos);
            $this->mesaRecintoRepository->update($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }



    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }
}
