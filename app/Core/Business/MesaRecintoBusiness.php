<?php


namespace App\Core\Business;


use App\Core\Models\Docente;
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
            $mas['presidente']=$request['pre_mas'];
            $mas['diputado']=$request['dip_mas'];
            $mas['id']=1;

            $creemos['presidente']=$request['pre_cre'];
            $creemos['diputado']=$request['dip_cre'];
            $creemos['id']=2;

            $comunidad_ciudadana['presidente']=$request['pre_com'];
            $comunidad_ciudadana['diputado']=$request['dip_com'];
            $comunidad_ciudadana['id']=3;

            $votos[1]=$mas;
            $votos[2]=$creemos;
            $votos[3]=$comunidad_ciudadana;
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

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }
}
