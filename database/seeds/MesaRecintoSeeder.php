<?php

use Illuminate\Database\Seeder;
use App\Core\Models\MesaRecinto;
use App\Core\Models\Recinto;

class MesaRecintoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recintos = Recinto::all();
        foreach ($recintos as $recinto) {
            for($i=1;$i<=$recinto->cantidad_mesas;$i++)
            MesaRecinto::create([
                'nulos' => 0,
                'blancos' => 0,
                'recinto_id' => $recinto->id,
                'mesa_nro' => $i,
                'con_votos' => false
            ]);
        }
    }
}
