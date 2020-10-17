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
            'nombre' => 'Camacho',
            'cargo' => 'presidente',
            'partido_id' => '1'
        ]);
        Postulante::create([
            'nombre' => 'Postulante ADN',
            'cargo' => 'presidente',
            'partido_id' => '2'
        ]);
        Postulante::create([
            'nombre' => 'Luis Arce',
            'cargo' => 'presidente',
            'partido_id' => '3'
        ]);
        Postulante::create([
            'nombre' => 'Postulante FPV',
            'cargo' => 'presidente',
            'partido_id' => '4'
        ]);
        Postulante::create([
            'nombre' => 'Postulante Pan-bol',
            'cargo' => 'presidente',
            'partido_id' => '5'
        ]);

        Postulante::create([
            'nombre' => 'Mesa',
            'cargo' => 'presidente',
            'partido_id' => '6'
        ]);
        Postulante::create([
            'nombre' => 'Tuto',
            'cargo' => 'presidente',
            'partido_id' => '7'
        ]);
        Postulante::create([
            'nombre' => 'Añez',
            'cargo' => 'presidente',
            'partido_id' => '8'
        ]);


//DIPUTADOS

        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '1'
        ]);
        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '2'
        ]);
        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '3'
        ]);
        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '4'
        ]);
        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '5'
        ]);

        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '6'
        ]);
        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '7'
        ]);
        Postulante::create([
            'nombre' => 'diputado',
            'cargo' => 'diputado',
            'partido_id' => '8'
        ]);
    }
}
