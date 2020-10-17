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
            'nombre' => 'Creemos'
        ]);
        Partido::create([
            'nombre' => 'ADN'
        ]);
        Partido::create([
            'nombre' => 'MAS-IPSP'
        ]);
        Partido::create([
            'nombre' => 'FPV'
        ]);
        Partido::create([
            'nombre' => 'PAN-BOL'
        ]);
        Partido::create([
            'nombre' => 'Comunidad Ciudadana'
        ]);
        Partido::create([
            'nombre' => 'Libre 21'
        ]);
        Partido::create([
            'nombre' => 'Juntos'
        ]);
    }
}
