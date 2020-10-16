<?php


namespace App\Core\Business;


use App\Core\Models\Docente;
use App\Core\Repositories\AdministrativoRepository;
use App\Core\Repositories\MesaRepository;
use App\Core\Repositories\PermisoRepository;
use App\Core\Repositories\PersonaRepository;
use App\Core\Repositories\RolRepository;
use App\Core\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaBusiness
{
    protected $mesaRepository;


    public function __construct(MesaRepository $mesaRepository)
    {
        $this->mesaRepository = $mesaRepository;
    }

    public function index($recinto_id)
    {
        try {
            $mesas = $this->mesaRepository->allByRecinto($recinto_id);

            $data['mesas'] = $mesas;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    /**
     * metodo que nos proporciona al ciente del prestamo, sin importar si es docente o administrativo
     * //TODO:consultar si los encargados de bodega pueden ser clientes, podria lanzarse un caso de excepcion para controlarlo
     * @param $id
     * @return mixed
     */
    public function personaYCargo($id)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

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
