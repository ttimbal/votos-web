<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipio::create([
            'nombre' => 'La Guardia',
            'circunscripcion_nro' => 55
        ]);
    }
}
