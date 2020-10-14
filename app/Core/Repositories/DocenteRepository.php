<?php


namespace App\Core\Repositories;


use App\Core\Models\Docente;

class DocenteRepository
{
    public function allPaginated()
    {
        return Docente::paginate(5);
    }

    public function all()
    {
        return Docente::all();
    }

    public function find($persona_id)
    {
        return Docente::findOrFail($persona_id);
    }

    /**
     * metodo que verifica si el id de la persona que se le pasa por parametro
     * le pertenece a un docente
     * @param integer $id
     */
    public function esDocente($id)
    {
        return Docente::find($id) !== null;
    }

    /**
     * metodo que devuelve todos los datos de un docente
     * precondicion: si o si se debe de mandar el id del docente
     * @param integer $id
     */
    public function getDocente($id)
    {
        $docente = Docente::select('id', 'nombre', 'direccion','activo', 'correo', 'ci_nit', 'inicio')
            ->where('id', $id)
            ->join('personas', 'docentes.persona_id', '=', 'personas.id')
            ->get();
        return $docente[0];
    }

    /**
     * metodo que retorna todos los docentes
     * @return mixed
     */
    public function getAllDocentes()
    {
        return Docente::select('id', 'nombre', 'direccion','activo', 'correo', 'ci_nit', 'inicio')
            ->join('personas', 'docentes.persona_id', '=', 'personas.id')
            ->get();
    }

    public function index()
    {
        $docentes = $this->allPaginated();
        $docentes->load('persona');
        $docentes->load('telefonos');
        return $docentes;
    }

    public function indexApi()
    {
        $docentes = $this->all();
        $docentes->load('persona');
        $docentes->load('telefonos');
        return $docentes;
    }

    /**
     * metodo que guarda los datos de un docentes
     * Precondicion: se debe mandar el id de persona
     * @param $data
     */
    public function store($data)
    {
        $docente = new Docente();
        $docente->persona_id = $data['id'];
        $docente->inicio = $data['inicio'];
        $docente->save();
    }

    public function show($persona_id)
    {
        $docente = $this->find($persona_id);
        $docente->load('persona');
        $docente->load('telefonos');
        return $docente;
    }

    public function update($data, $persona_id)
    {
        $docente = $this->find($persona_id);
        $docente->inicio = $data['inicio'];
        $docente->save();
    }
}
