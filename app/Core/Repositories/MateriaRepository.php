<?php


namespace App\Core\Repositories;


use App\Core\Models\Materia;
use Illuminate\Support\Facades\DB;

class MateriaRepository
{
    public function all()
    {
        return Materia::all();
    }

    public function find($sigla)
    {
        return Materia::findOrfail($sigla);
    }

    public function store($data)
    {
        $materia = new Materia();
        $materia->sigla = $data['sigla'];
        $materia->nombre = $data['nombre'];
        $materia->precio = $data['precio'];
        $materia->save();
        return $materia;
    }

    public function update($data, $sigla)
    {
        $materia = $this->find($sigla);
        $materia->sigla = $data['sigla'];
        $materia->nombre = $data['nombre'];
        $materia->precio = $data['precio'];
        $materia->save();
        return $materia;
    }

    public function destroy($sigla)
    {
        $materia = $this->find($sigla);
        return $materia->delete();
    }

    /**
     * metodo que da todas las materias de un curso especifico
     * @param $codigo del curso
     * @return array
     */
    public function materias($codigo)
    {
        return DB::select('SELECT * FROM materia_cursos,materias WHERE materia_sigla = sigla and curso_codigo = :codigo', ['codigo' => $codigo]);
    }
}
