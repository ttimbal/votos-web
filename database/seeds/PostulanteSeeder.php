<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Postulante;

class PostulanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postulante::create([
            'nombre' => 'Luis Arce',
            'cargo' => 'presidente',
            'partido_id' => '1'
        ]);
        Postulante::create([
            'nombre' => 'Camacho',
            'cargo' => 'presidente',
            'partido_id' => '2'
        ]);
        Postulante::create([
            'nombre' => 'Mesa',
            'cargo' => 'presidente',
            'partido_id' => '3'
        ]);
    }
}
