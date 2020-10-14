<?php


namespace App\Core\Repositories;


use App\Core\Models\Curso;
use Illuminate\Support\Facades\DB;

class CursoRepository
{
    public function all()
    {
        return Curso::all();
    }

    public function find($codigo)
    {
        return Curso::findOrFail($codigo);
    }

    public function store($data)
    {
        $curso = new Curso();
        $curso->nombre = $data['nombre'];
        $curso->duracion = $data['duracion'];
        $curso->save();
        return $curso;
    }

    public function update($data, $codigo)
    {
        $curso = $this->find($codigo);
        $curso->nombre = $data['nombre'];
        $curso->duracion = $data['duracion'];
        $curso->save();
        return $curso;
    }

    public function delete($codigo)
    {
        $curso = $this->find($codigo);
        return $curso->delete(); //retorna un bool
    }

    /**
     * metodo que proporciona todos las cursos de una determinada sigla de materia
     * @param $sigla
     * @return array
     */
    public function cursos($sigla)
    {
        return DB::select('SELECT * FROM materia_cursos,cursos WHERE curso_codigo = codigo and materia_sigla = :sigla', ['sigla' => $sigla]);
    }
}
