<?php

use App\Core\Models\Materia;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materia::create([
            'sigla' => 'GUI-101',
            'nombre' => 'Guitarra 1',
            'precio' => 200
        ]);
        Materia::create([
            'sigla' => 'GUI-102',
            'nombre' => 'Guitarra 2',
            'precio' => 250
        ]);
        Materia::create([
            'sigla' => 'PIA-101',
            'nombre' => 'Piano 1',
            'precio' => 300
        ]);
        Materia::create([
            'sigla' => 'PIA-102',
            'nombre' => 'Piano 2',
            'precio' => 305
        ]);
        Materia::create([
            'sigla' => 'CAN-101',
            'nombre' => 'Canto 1',
            'precio' => 230
        ]);
    }
}
