<?php

use App\Core\Models\Docente;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Docente::create([
            'persona_id' => 1,
            'inicio' => '2018-08-15'
        ]);
        Docente::create([
            'persona_id' => 2,
            'inicio' => '2019-10-10'
        ]);
        Docente::create([
            'persona_id' => 5,
            'inicio' => '2020-02-20'
        ]);
        Docente::create([
            'persona_id' => 6,
            'inicio' => '2019-10-09'
        ]);
        Docente::create([
            'persona_id' => 8,
            'inicio' => '2018-11-29'
        ]);
        Docente::create([
            'persona_id' => 10,
            'inicio' => '2019-03-21'
        ]);
        Docente::create([
            'persona_id' => 12,
            'inicio' => '2018-09-03'
        ]);
        Docente::create([
            'persona_id' => 16,
            'inicio' => '2017-10-12'
        ]);
        Docente::create([
            'persona_id' => 17,
            'inicio' => '2018-09-15'
        ]);
        Docente::create([
            'persona_id' => 19,
            'inicio' => '2019-06-06'
        ]);

        $faker = Faker\Factory::create();
        for ($i = 22; $i <= 50; $i++)
        {
            Docente::create([
                'persona_id' => $i,
                'inicio' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
