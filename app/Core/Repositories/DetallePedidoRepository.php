<?php


namespace App\Core\Repositories;


use App\Core\Models\DetallePedido;
use Illuminate\Support\Facades\DB;

class DetallePedidoRepository
{

    /**
     * metodo que guarda todos los detalles de los pedidos
     * Precondicion:necesita que le manden el numero de pedido
     * @param $data
     */
    public function store($data)
    {
        $nombreInstrumentos_id = $data['nombreInstrumentos_id'];
        $cantidades = $data['cantidades'];
        for ($contador = 0; $contador < sizeof($nombreInstrumentos_id); $contador++)
        {
            $detalle = new DetallePedido();
            $detalle->pedido_numero = $data['numero'];
            $detalle->nombre_instrumento_id = $nombreInstrumentos_id[$contador];
            $detalle->cantidad = $cantidades[$contador];
            $detalle->save();
        }
    }

    /**
     * metodo que retorna todos los detalles de un numero de pedido
     * @param $numero
     * @return array
     */
    public function find($numero)
    {
        $detalles = DB::select('SELECT id,nombre,cantidad FROM nombre_instrumentos, detalle_pedidos WHERE id = nombre_instrumento_id and pedido_numero = :numero', ['numero' => $numero]);
        return $detalles;
    }

    public function update($data, $pedido_numero)
    {
        $this->deleteAll($pedido_numero);
        $nombreInstrumentos_id = $data['nombreInstrumentos_id'];
        $cantidades = $data['cantidades'];
        for ($contador = 0; $contador < sizeof($nombreInstrumentos_id); $contador++)
        {
            $detalle = new DetallePedido();
            $detalle->nombre_instrumento_id = $nombreInstrumentos_id[$contador];
            $detalle->pedido_numero = $pedido_numero;
            $detalle->cantidad = $cantidades[$contador];
            $detalle->save();
        }
    }

    /**
     * metodo que elimina todos los detalles de pedido que le pertenezcan a ese numero de pedido
     * @param $pedido_numero
     */
    public function deleteAll($pedido_numero)
    {
        DB::table('detalle_pedidos')
            ->where('pedido_numero',$pedido_numero)
            ->delete();
    }
}
