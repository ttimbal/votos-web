<?php

use App\Core\Models\GrupoHorario;
use Illuminate\Database\Seeder;

class GrupoHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrupoHorario::create([
            'grupo_id' => 1,
            'horario_id' => 1
        ]);
        GrupoHorario::create([
            'grupo_id' => 1,
            'horario_id' => 2
        ]);
        GrupoHorario::create([
            'grupo_id' => 2,
            'horario_id' => 3
        ]);
        GrupoHorario::create([
            'grupo_id' => 2,
            'horario_id' => 4
        ]);
        GrupoHorario::create([
            'grupo_id' => 2,
            'horario_id' => 5
        ]);
        GrupoHorario::create([
            'grupo_id' => 3,
            'horario_id' => 6
        ]);
        GrupoHorario::create([
            'grupo_id' => 3,
            'horario_id' => 7
        ]);
        GrupoHorario::create([
            'grupo_id' => 4,
            'horario_id' => 8
        ]);
        GrupoHorario::create([
            'grupo_id' => 4,
            'horario_id' => 9
        ]);
        GrupoHorario::create([
            'grupo_id' => 4,
            'horario_id' => 10
        ]);
    }
}
