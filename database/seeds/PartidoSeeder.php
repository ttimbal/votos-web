<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Partido;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partido::create([
            'nombre' => 'MAS'
        ]);
        Partido::create([
            'nombre' => 'Creemos'
        ]);
        Partido::create([
            'nombre' => 'Comunidad Ciudadana'
        ]);
    }
}
