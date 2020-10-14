<?php

use App\Core\Models\MateriaCurso;
use Illuminate\Database\Seeder;

class MateriaCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MateriaCurso::create([
            'materia_sigla' => 'GUI-101',
            'curso_codigo' => 1
        ]);
        MateriaCurso::create([
            'materia_sigla' => 'GUI-102',
            'curso_codigo' => 1
        ]);
        MateriaCurso::create([
            'materia_sigla' => 'PIA-101',
            'curso_codigo' => 3
        ]);
        MateriaCurso::create([
            'materia_sigla' => 'PIA-102',
            'curso_codigo' => 3
        ]);
        MateriaCurso::create([
            'materia_sigla' => 'CAN-101',
            'curso_codigo' => 4
        ]);
    }
}
