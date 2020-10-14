<?php

use App\Core\Models\Periodo;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
            'nombre' => 'Semestre 1/2018',
            'fecha_inicio' => '2018-02-10',
            'fecha_fin' => '2018-06-24'
        ]);
        Periodo::create([
            'nombre' => 'Semestre 2/2018',
            'fecha_inicio' => '2018-07-15',
            'fecha_fin' => '2018-12-14'
        ]);
        Periodo::create([
            'nombre' => 'Semestre 1/2019',
            'fecha_inicio' => '2019-02-12',
            'fecha_fin' => '2019-06-20'
        ]);
        Periodo::create([
            'nombre' => 'Semestre 2/2019',
            'fecha_inicio' => '2019-07-05',
            'fecha_fin' => '2018-11-30'
        ]);
        Periodo::create([
            'nombre' => 'Semestre 1/2020',
            'fecha_inicio' => '2020-02-09',
            'fecha_fin' => '2020-06-27'
        ]);
    }
}
