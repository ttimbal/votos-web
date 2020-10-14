<?php

use App\Core\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especialidad::create([
            'nombre' => 'Guitarra'
        ]);
        Especialidad::create([
            'nombre' => 'Flauta'
        ]);
        Especialidad::create([
            'nombre' => 'Saxofón'
        ]);
        Especialidad::create([
            'nombre' => 'Bateria'
        ]);
        Especialidad::create([
            'nombre' => 'Violin'
        ]);
        Especialidad::create([
            'nombre' => 'Teclado'
        ]);
        Especialidad::create([
            'nombre' => 'Bajo'
        ]);
        Especialidad::create([
            'nombre' => 'Clarinete'
        ]);
        Especialidad::create([
            'nombre' => 'Trompeta'
        ]);
        Especialidad::create([
            'nombre' => 'Oboe'
        ]);
        Especialidad::create([
            'nombre' => 'Arpa'
        ]);
        Especialidad::create([
            'nombre' => 'Violín'
        ]);
        Especialidad::create([
            'nombre' => 'Piano'
        ]);
        Especialidad::create([
            'nombre' => 'Timbal'
        ]);
        Especialidad::create([
            'nombre' => 'Tambor'
        ]);
        Especialidad::create([
            'nombre' => 'Platillos'
        ]);
        Especialidad::create([
            'nombre' => 'Bombo'
        ]);
        Especialidad::create([
            'nombre' => 'Bajo Eléctrico'
        ]);
        Especialidad::create([
            'nombre' => 'Guitarra Eléctrica'
        ]);
        Especialidad::create([
            'nombre' => 'Theremín'
        ]);
        Especialidad::create([
            'nombre' => 'Sintetizador'
        ]);
    }
}
