<?php


namespace App\Core\Repositories;


use App\Core\Models\Prestamo;
use Carbon\Carbon;

class PrestamoRepository
{
    /**
     * metodo que proporciona todos los prestamos
     * @return Prestamo[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Prestamo::all();
    }

    /**
     * metodo para buscar un prestamo especifico
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Prestamo::findOrFail($id);
    }

    public function index()
    {
        $prestamos = $this->all();
        $prestamos->load('persona');
        $prestamos->load('administrativo_persona');
        return $prestamos;
    }

    /**
     * metodo que crea un nuevo prestamo (el encabezado de una nota de prestamo)
     * @param $data
     * @return Prestamo
     */
    public function store($data)
    {
        $prestamo = new Prestamo();
        $prestamo->fecha = Carbon::now('America/La_Paz')->toDateString();
        $prestamo->hora = Carbon::now('America/La_Paz')->toTimeString();
        $prestamo->fecha_devolver =$data['fecha'];
        $prestamo->hora_devolver = $data['hora'];
        $prestamo->persona_id = $data['cliente_id'];
        $prestamo->administrativo_id = $data['encargadoDeAlmacen'];
        $prestamo->save();
        return $prestamo;
    }

    /**
     * metodo que actualiza un prestamo(el encabezado)
     * @param $data
     * @param $id
     */
    public function update($data, $id)
    {
        $prestamo = $this->find($id);
        $prestamo->administrativo_id = $data['encargadoDeAlmacen'];
        $prestamo->persona_id = $data['cliente'];
        $prestamo->save();
    }

    /**
     * metodo que elimina un prestamo
     * Nota.- se eliminaran todos sus detalles tambien.
     * @param $id
     */
    public function destroy($id)
    {
        Prestamo::destroy($id);
    }
}
