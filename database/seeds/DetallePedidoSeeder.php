<?php

use App\Core\Models\DetallePedido;
use Illuminate\Database\Seeder;

class DetallePedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetallePedido::create([
            'nombre_instrumento_id' => 1,
            'pedido_numero' => 1,
            'cantidad' => 2
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 2,
            'pedido_numero' => 1,
            'cantidad' => 3
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 3,
            'pedido_numero' => 1,
            'cantidad' => 2
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 4,
            'pedido_numero' => 2,
            'cantidad' => 5
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 5,
            'pedido_numero' => 2,
            'cantidad' => 5
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 6,
            'pedido_numero' => 3,
            'cantidad' => 3
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 7,
            'pedido_numero' => 3,
            'cantidad' => 2
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 8,
            'pedido_numero' => 4,
            'cantidad' => 7
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 9,
            'pedido_numero' => 4,
            'cantidad' => 2
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 10,
            'pedido_numero' => 5,
            'cantidad' => 5
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 11,
            'pedido_numero' => 5,
            'cantidad' => 4
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 12,
            'pedido_numero' => 6,
            'cantidad' => 3
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 13,
            'pedido_numero' => 6,
            'cantidad' => 6
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 14,
            'pedido_numero' => 1,
            'cantidad' => 3
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 15,
            'pedido_numero' => 2,
            'cantidad' => 2
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 16,
            'pedido_numero' => 3,
            'cantidad' => 3
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 17,
            'pedido_numero' => 4,
            'cantidad' => 4
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 18,
            'pedido_numero' => 5,
            'cantidad' => 5
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 19,
            'pedido_numero' => 6,
            'cantidad' => 8
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 20,
            'pedido_numero' => 1,
            'cantidad' => 5
        ]);
        DetallePedido::create([
            'nombre_instrumento_id' => 21,
            'pedido_numero' => 2,
            'cantidad' => 1
        ]);
    }
}
