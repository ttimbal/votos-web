<?php


namespace App\Core\Repositories;


use App\Core\Models\Afinidad;
use App\Core\Models\Especialidad;
use Illuminate\Support\Facades\DB;

class EspecialidadRepository
{
    public function all()
    {
        return Especialidad::all();
    }

    public function find($id)
    {
        return Especialidad::findOrFail($id);
    }

    /**
     * metodo que guarda todas las especialidades
     * Precondicion:se debe mandar el id de la persona
     * @param $data
     */
    public function store($data)
    {
        $especialidades = $data['especialidades'];
        foreach ($especialidades as $especialidad) {
            $afinidad = new Afinidad();
            $afinidad->docente_id = $data['id'];
            $afinidad->especialidad_id = $especialidad;
            $afinidad->save();
        }
        return $especialidades;
    }

    public function storeOne($data)
    {
        $especialidad = new Especialidad();
        $especialidad->nombre = $data['nombre'];
        $especialidad->save();
        return $especialidad;
    }

    public function updateOne($data, $id)
    {
        $especialidad = $this->find($id);
        $especialidad->nombre  = $data['nombre'];
        return $especialidad->save();
    }

    public function update($data, $docente_id)
    {
        $this->deleteAll($docente_id);
        $especialidades = $this->store($data);
        return $especialidades;
    }

    public function destroy($id)
    {
        $especialidad = $this->find($id);
        return $especialidad->delete();
    }

    /**
     * metodo que elimina todas las especialidades que le pertenecen al docente_id
     * @param $docente_id
     */
    public function deleteAll($docente_id)
    {
        DB::table('afinidades')
            ->where('docente_id', $docente_id)
            ->delete();
    }

    /**
     * metodo que da todas las especialidades de una persona especifica
     * @param $docente_id
     * @return array
     */
    public function especialidades($docente_id)
    {
        return DB::select('SELECT id,nombre FROM afinidades,especialidades WHERE especialidad_id = id and docente_id = :persona_id', ['persona_id' => $docente_id]);
    }
}
