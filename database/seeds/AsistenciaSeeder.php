<?php

use App\Core\Models\Asistencia;
use App\Core\Repositories\AsistenciaRepository;
use Illuminate\Database\Seeder;

class AsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asistencia::create([
            'fecha' => '2020-3-21',
            'estado' => AsistenciaRepository::$asistencia,
            'persona_id' => 2
        ]);
        Asistencia::create([
            'fecha' => '2019-10-15',
            'estado' => AsistenciaRepository::$falta,
            'persona_id' => 1
        ]);
        Asistencia::create([
            'fecha' => '2019-9-20',
            'estado' => AsistenciaRepository::$permiso,
            'persona_id' => 5
        ]);
        Asistencia::create([
            'fecha' => '2019-8-15',
            'estado' => AsistenciaRepository::$permiso,
            'persona_id' => 10
        ]);
        Asistencia::create([
            'fecha' => '2019-7-20',
            'estado' => AsistenciaRepository::$falta,
            'persona_id' => 12
        ]);
        Asistencia::create([
            'fecha' => '2019-3-21',
            'estado' => AsistenciaRepository::$asistencia,
            'persona_id' => 15
        ]);
        Asistencia::create([
            'fecha' => '2019-10-20',
            'estado' => AsistenciaRepository::$falta,
            'persona_id' => 20
        ]);
        Asistencia::create([
            'fecha' => '2019-11-20',
            'estado' => AsistenciaRepository::$asistencia,
            'persona_id' => 21
        ]);
        Asistencia::create([
            'fecha' => '2019-11-21',
            'estado' => AsistenciaRepository::$falta,
            'persona_id' => 5
        ]);
        Asistencia::create([
            'fecha' => '2019-11-21',
            'estado' => AsistenciaRepository::$permiso,
            'persona_id' => 10
        ]);
    }
}
