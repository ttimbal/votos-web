<?php


namespace App\Core\Business;


use App\Core\Models\Docente;
use App\Core\Repositories\AdministrativoRepository;
use App\Core\Repositories\PermisoRepository;
use App\Core\Repositories\PersonaRepository;
use App\Core\Repositories\RolRepository;
use App\Core\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecintoBusiness
{
    protected $usuarioRepository;
    protected $administrativoRepository;
    protected $personaRepository;
    protected $rolRepository;
    protected $permisoRepository;

    public function __construct(UsuarioRepository $usuarioRepository,
                                AdministrativoRepository $administrativoRepository,
                                PersonaRepository $personaRepository,
                                RolRepository $rolRepository,
                                PermisoRepository $permisoRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->administrativoRepository = $administrativoRepository;
        $this->personaRepository = $personaRepository;
        $this->rolRepository = $rolRepository;
        $this->permisoRepository = $permisoRepository;
    }

    public function index()
    {
        try {
            $usuarios = $this->usuarioRepository->all();
            foreach ($usuarios as $usuario) {
                $usuario['datos_personales'] = $this->personaYCargo($usuario->persona_id);
            }
            $data['usuarios'] = $usuarios;
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
        $persona = $this->personaRepository->find($id);
        $datos['persona'] = $persona;
        $docente = Docente::find($id);  //TODO:buscar una solucion para no usar find directo de la clase
        if (empty($docente)) {
            $adimnistrativo = $this->administrativoRepository->find($id);
            $datos['administrativo'] = $adimnistrativo;
            return $datos;
        }
        $datos['docente'] = $docente;
        return $datos;
    }

    public function create()
    {
        try {
            $roles = $this->rolRepository->all();
            $permisos = $this->permisoRepository->all();

//            para sacar docentes con cuentas
//            $docentes = DB::table('docentes')
//                ->join('users','docentes.persona_id','users.id')
//                ->get();
            $registrados = DB::table('users')
                ->select('id')
                ->get();

            $idRegistrados = [];
            foreach ($registrados as $registrado)
            {
                $idRegistrados[] = $registrado->id;
            }

            $docentesSinRegistrar = DB::table('docentes')
                ->select(['id','nombre'])
                ->join('personas', 'docentes.persona_id', '=','personas.id')
                ->whereNotIn('persona_id',$idRegistrados)
                ->get();

            $administrativosSinRegistrar = DB::table('administrativos')
                ->select(['id', 'nombre', 'cargo'])
                ->join('personas', 'administrativos.persona_id', '=', 'personas.id')
                ->whereNotIn('persona_id',$idRegistrados)
                ->get();

            $data['roles'] = $roles;
            $data['permisos'] = $permisos;
            $data['docentesSinRegistrar'] = $docentesSinRegistrar;
            $data['administrativosSinRegistrar'] = $administrativosSinRegistrar;
//            $data['idRegistrados'] = $idRegistrados;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $persona = $this->personaRepository->find($request->input('persona_id'));
            $request['persona'] = $persona;
            $request['usuario'] = $this->usuarioRepository->store($request);
            $this->rolRepository->asignarRol($request);
            $this->permisoRepository->asignarPermisos($request);

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
        try {
            $usuario = $this->usuarioRepository->find($id);
            $persona = $this->personaRepository->find($usuario->persona_id);
//            $usuario->getRoleNames();  //para ver solo los roles directos
//            $usuario->getPermissionNames(); //para ver solo los permisos directos
            $usuario->getAllPermissions(); //proporciona todos los permisos directos y roles con sus correspondientes permisos
            $data['usuario'] = $usuario;
            $data['persona'] = $persona;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($id)
    {
        try {
            $usuario = $this->usuarioRepository->find($id);
            $usuario->getRoleNames();  //para ver solo los roles directos
            $usuario->getPermissionNames(); //para ver solo los permisos directos
            $roles = $this->rolRepository->all();
            $permisos = $this->permisoRepository->all();
            $data['usuario'] = $usuario;
            $data['roles'] = $roles;
            $data['permisos'] = $permisos;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $request['usuario'] = $this->usuarioRepository->find($id);
            $this->rolRepository->actualizarRol($request);
            $this->permisoRepository->actualizarPermisos($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $this->usuarioRepository->destroy($id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
