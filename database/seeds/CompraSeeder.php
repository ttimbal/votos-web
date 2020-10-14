<?php

use App\Core\Models\Compra;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compra::create([
            'fecha' => '2019-08-15',
            'proveedor_id' => 4,
            'pedido_numero' => 1,
        ]);
        Compra::create([
            'fecha' => '2019-05-10',
            'proveedor_id' => 7,
            'pedido_numero' => 2,
        ]);
        Compra::create([
            'fecha' => '2019-03-21',
            'proveedor_id' => 11,
            'pedido_numero' => 3,
        ]);
    }
}
