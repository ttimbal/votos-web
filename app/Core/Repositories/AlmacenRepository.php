<?php


namespace App\Core\Repositories;


use App\Core\Models\Almacen;

class AlmacenRepository
{
    public function all()
    {
        return Almacen::all();
    }

    public function find($codigo)
    {
        return Almacen::findOrFail($codigo);
    }

    public function store($data)
    {
        $almacen = new Almacen();
        $almacen->nombre = $data['nombre'];
        $almacen->ubicacion = $data['ubicacion'];
        $almacen->save();
    }

    public function update($data, $codigo)
    {
        $almacen = $this->find($codigo);
        $almacen->nombre = $data['nombre'];
        $almacen->ubicacion = $data['ubicacion'];
        $almacen->save();
    }

    public function destroy($codigo)
    {
        $almacen = $this->find($codigo);
        $almacen->delete();
    }
}
