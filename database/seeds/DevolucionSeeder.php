<?php

use App\Core\Models\Devolucion;
use Illuminate\Database\Seeder;

class DevolucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Devolucion::create([
            'fecha' => '2019-02-10',
            'hora' => '11:30',
            'persona_id' => 1,
            'administrativo_id' => 21,
            'prestamo_id' => 1
        ]);
        Devolucion::create([
            'fecha' => '2019-08-15',
            'hora' => '18:40',
            'persona_id' => 5,
            'administrativo_id' => 9,
            'prestamo_id' => 2
        ]);
        Devolucion::create([
            'fecha' => '2020-03-21',
            'hora' => '13:15',
            'persona_id' => 12,
            'administrativo_id' => 9,
            'prestamo_id' =>3
        ]);
    }
}
