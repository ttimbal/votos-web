<?php


namespace App\Core\Repositories;


use App\Core\Models\Administrativo;

class AdministrativoRepository
{

    //traits
    use CargoAdministrativoTrait;

    public function all()
    {
        return Administrativo::all();
    }

    public function find($persona_id)
    {
        return Administrativo::findOrFail($persona_id);
    }

    /**
     * metodo que verifica si el id de la persona que se le pasa por parametro
     * le pertenece a un administrativo
     * @param integer $id
     */
    public function esAdministrativo($id)
    {
        return Administrativo::find($id) !== null;
    }

    /**
     * metodo que devuelve todos los datos de un administrativo
     * precondicion: si o si se debe de mandar el id del administrativo
     * @param $id
     * @return mixed
     */
    public function getAdministrativo($id)
    {
        $administrativo = Administrativo::select('id', 'nombre', 'direccion','activo', 'correo', 'ci_nit', 'cargo', 'inicio')
            ->where('id', $id)
            ->join('personas', 'administrativos.persona_id', '=', 'personas.id')
            ->get();
        return $administrativo[0];
    }

    public function getAllAdministrativos()
    {
        return Administrativo::select('id', 'nombre', 'direccion','activo', 'correo', 'ci_nit', 'cargo', 'inicio')
            ->join('personas', 'administrativos.persona_id', '=', 'personas.id')
            ->get();
    }

    public function buscar($persona_id)
    {
        return Administrativo::find($persona_id);
    }

    public function index()
    {
        $administrativos = $this->all();
        $administrativos->load('persona');
        $administrativos->load('telefonos');
        return $administrativos;
    }

    /**
     * metodo que guarda los datos de un administrativo
     * Precondicion:se debe de mandar el id de la persona
     * @param $data
     * @return Administrativo
     */
    public function store($data)
    {
        $administrativo = new Administrativo();
        $administrativo->persona_id = $data['id'];
        $administrativo->cargo = $data['cargo'];
        $administrativo->inicio = $data['inicio'];
        $administrativo->save();
        return $administrativo;
    }

    public function show($persona_id)
    {
        $administrativo = $this->find($persona_id);
        $administrativo->load('persona');
        $administrativo->load('telefonos');
        return $administrativo;
    }

    public function update($data, $persona_id)
    {
        $administrativo = $this->find($persona_id);
        $administrativo->cargo = $data['cargo'];
        $administrativo->inicio = $data['inicio'];
        $administrativo->save();
    }
}
