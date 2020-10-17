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
        Municipio::create([
            'nombre' => 'Camiri',
            'circunscripcion_nro' => 55
        ]);
        Municipio::create([
            'nombre' => 'Cabezas',
            'circunscripcion_nro' => 55
        ]);

        Municipio::create([
            'nombre' => 'Charagua',
            'circunscripcion_nro' => 55
        ]);
        Municipio::create([
            'nombre' => 'Boyuibe',
            'circunscripcion_nro' => 55
        ]);
        Municipio::create([
            'nombre' => 'Lagunillas',
            'circunscripcion_nro' => 55
        ]);
        Municipio::create([
            'nombre' => 'Cuevo',
            'circunscripcion_nro' => 55
        ]);

    }
}
