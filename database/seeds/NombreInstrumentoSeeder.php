<?php

use App\Core\Models\NombreInstrumento;
use Illuminate\Database\Seeder;

class NombreInstrumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NombreInstrumento::create([
            'nombre' => 'Guitarra'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Flauta'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Saxofón'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Bateria'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Violin'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Teclado'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Bajo'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Clarinete'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Trompeta'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Oboe'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Arpa'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Violín'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Piano'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Timbal'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Tambor'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Platillos'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Bombo'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Bajo Eléctrico'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Guitarra Eléctrica'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Theremín'
        ]);
        NombreInstrumento::create([
            'nombre' => 'Sintetizador'
        ]);
    }
}
