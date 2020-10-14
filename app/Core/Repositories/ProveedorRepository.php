<?php


namespace App\Core\Repositories;


use App\Core\Models\Proveedor;

class ProveedorRepository
{
    public function all()
    {
        return Proveedor::all();
    }

    public function find($persona_id)
    {
        return Proveedor::findOrFail($persona_id);
    }

    public function index()
    {
        $proveedores = $this->all();
        $proveedores->load('persona');
        $proveedores->load('telefonos');
        return $proveedores;
    }

    public function store($data)
    {
        $proveedor = new Proveedor();
        $proveedor->persona_id = $data['id'];
        $proveedor->ciudad = $data['ciudad'];
        $proveedor->save();
        return $proveedor;
    }

    public function show($persona_id)
    {
        $proveedor = $this->find($persona_id);
        $proveedor->load('persona');
        $proveedor->load('telefonos');
        return $proveedor;
    }

    public function update($data, $persona_id)
    {
        $proveedor = $this->find($persona_id);
        $proveedor->ciudad = $data['ciudad'];
        $proveedor->save();
    }
}
