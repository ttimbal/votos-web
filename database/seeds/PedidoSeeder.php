<?php

use App\Core\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::create([
            'fecha' => '2019-10-15',
            'proveedor_id' => 4
        ]);
        Pedido::create([
            'fecha' => '2019-08-20',
            'proveedor_id' => 7
        ]);
        Pedido::create([
            'fecha' => '2018-06-05',
            'proveedor_id' => 11
        ]);
        Pedido::create([
            'fecha' => '2019-02-10',
            'proveedor_id' => 13
        ]);
        Pedido::create([
            'fecha' => '2019-12-25',
            'proveedor_id' => 14
        ]);
        Pedido::create([
            'fecha' => '2020-08-15',
            'proveedor_id' => 4
        ]);
    }
}
