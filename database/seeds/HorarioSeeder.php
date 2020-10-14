<?php

use App\Core\Models\Horario;
use App\Core\Repositories\HorarioRepository;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            'dia' => HorarioRepository::MARTES,
            'hora_inicio' => '07:00',
            'hora_fin' => '09:15'
        ]);
        Horario::create([
            'dia' => HorarioRepository::JUEVES,
            'hora_inicio' => '07:00',
            'hora_fin' => '09:15'
        ]);
        Horario::create([
            'dia' => HorarioRepository::LUNES,
            'hora_inicio' => '07:00',
            'hora_fin' => '08:30'
        ]);
        Horario::create([
            'dia' => HorarioRepository::MIERCOLES,
            'hora_inicio' => '07:00',
            'hora_fin' => '08:30'
        ]);
        Horario::create([
            'dia' => HorarioRepository::VIERNES,
            'hora_inicio' => '07:00',
            'hora_fin' => '08:30'
        ]);
        Horario::create([
            'dia' => HorarioRepository::MARTES,
            'hora_inicio' => '09:15',
            'hora_fin' => '11:30'
        ]);
        Horario::create([
            'dia' => HorarioRepository::JUEVES,
            'hora_inicio' => '09:15',
            'hora_fin' => '11:30'
        ]);
        Horario::create([
            'dia' => HorarioRepository::LUNES,
            'hora_inicio' => '08:30',
            'hora_fin' => '10:00'
        ]);
        Horario::create([
            'dia' => HorarioRepository::MIERCOLES,
            'hora_inicio' => '08:30',
            'hora_fin' => '10:00'
        ]);
        Horario::create([
            'dia' => HorarioRepository::VIERNES,
            'hora_inicio' => '08:30',
            'hora_fin' => '10:00'
        ]);
    }
}
