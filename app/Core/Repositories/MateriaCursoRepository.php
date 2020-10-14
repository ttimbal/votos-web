<?php


namespace App\Core\Repositories;


use App\Core\Models\MateriaCurso;
use Illuminate\Support\Facades\DB;

class MateriaCursoRepository
{
    public function store($data)
    {
        if (! empty($data['cursos_codigos']))
        {
            $cursos_codigos = $data['cursos_codigos'];
            foreach ($cursos_codigos as $curso_codigo)
            {
                $materiaCurso = new MateriaCurso();
                $materiaCurso->materia_sigla = $data['sigla'];
                $materiaCurso->curso_codigo = $curso_codigo;
                $materiaCurso->save();
            }
        }
    }

    /**
     * metodo que actualiza todos los materia carrera
     * Nota.- borra todos los antiguos con sigla e inserta los nuevos que estan en la data
     * @param $data
     * @param $sigla
     */
    public function update($data, $sigla)
    {
        $this->deleteAll($sigla);
        $this->store($data);
    }

    /**
     * metodo que borra todas las tuplas que le pertenezcan a esa sigla
     * @param $sigla
     */
    public function deleteAll($sigla)
    {
        DB::table('materia_cursos')
            ->where('materia_sigla', $sigla)
            ->delete();
    }
}
