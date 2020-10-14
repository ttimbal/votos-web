<?php

use App\Core\Models\Grupo;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create([
            'nombre' => 'GI',
            'docente_id' => 12,
            'materia_sigla' => 'GUI-101',
            'periodo_codigo' => 1
        ]);
        Grupo::create([
            'nombre' => 'PI',
            'docente_id' => 5,
            'materia_sigla' => 'PIA-101',
            'periodo_codigo' => 2
        ]);
        Grupo::create([
            'nombre' => 'PI',
            'docente_id' => 8,
            'materia_sigla' => 'PIA-102',
            'periodo_codigo' => 3
        ]);
        Grupo::create([
            'nombre' => 'CA',
            'docente_id' => 6,
            'materia_sigla' => 'CAN-101',
            'periodo_codigo' => 4
        ]);
    }
}
