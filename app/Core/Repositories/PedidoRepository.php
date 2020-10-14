<?php


namespace App\Core\Repositories;


use App\Core\Models\Pedido;
use Carbon\Carbon;

class PedidoRepository
{
    public function all()
    {
        return Pedido::all();
    }

    public function find($numero)
    {
        return Pedido::findOrFail($numero);
    }

    public function index()
    {
        $pedidos = $this->all();
        $pedidos->load('proveedor');
        return $pedidos;
    }

    public function store($data)
    {
        $pedido = new Pedido();
        $pedido->proveedor_id = $data['proveedor'];
        $pedido->fecha = Carbon::now('America/La_Paz')->toDateString();
        $pedido->save();
        return $pedido;
    }

    public function show($numero)
    {
        $pedido = $this->find($numero);
        $pedido->load('proveedor');
        return $pedido;
    }

    public function update($data, $numero)
    {
        $pedido = $this->find($numero);
        $pedido->proveedor_id = $data['proveedor'];
        $pedido->save();
    }

    public function destroy($numero)
    {
        $pedido = $this->find($numero);
        $pedido->delete();
    }
}
