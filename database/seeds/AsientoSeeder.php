<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Asiento;

class AsientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asiento::create([
            'nombre' => 'La Guardia',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Simon Bolivar',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Peji(Villa Arrien)',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Brecha 3',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Basilio',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Pedro Lorenzo',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'El Carmen (Ibañez)',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Kilómetro Doce',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'San José (Ibañez)',
            'municipio_id' => 1
        ]);

    }
}
