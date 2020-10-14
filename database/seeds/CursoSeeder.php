<?php

use App\Core\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'nombre' => 'Guitarra',
            'duracion' => 5
        ]);
        Curso::create([
            'nombre' => 'Teclado',
            'duracion' => 5
        ]);
        Curso::create([
            'nombre' => 'Piano',
            'duracion' => 5
        ]);
        Curso::create([
            'nombre' => 'Canto',
            'duracion' => 5
        ]);
        Curso::create([
            'nombre' => 'Multimedia',
            'duracion' => 5
        ]);
        Curso::create([
            'nombre' => 'Teatro',
            'duracion' => 5
        ]);
    }
}
