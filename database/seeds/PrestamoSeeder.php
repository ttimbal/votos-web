<?php

use App\Core\Models\Prestamo;
use Illuminate\Database\Seeder;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prestamo::create([
            'fecha' => '2019-02-10',
            'hora' => '7:30',
            'fecha_devolver' => '2019-02-11',
            'hora_devolver' => '8:30',
            'persona_id' => 1,
            'administrativo_id' => 9
        ]);
        Prestamo::create([
            'fecha' => '2020-08-15',
            'hora' => '15:00',
            'fecha_devolver' => '2020-02-15',
            'hora_devolver' => '16:30',
            'persona_id' => 5,
            'administrativo_id' => 21
        ]);
        Prestamo::create([
            'fecha' => '2019-10-20',
            'hora' => '10:25',
            'fecha_devolver' => '2019-02-20',
            'hora_devolver' => '12:30',
            'persona_id' => 12,
            'administrativo_id' => 9
        ]);

    }
}
