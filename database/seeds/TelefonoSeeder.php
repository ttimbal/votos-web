<?php

use App\Core\Models\Telefono;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantidadPersonas = DB::table('personas')->count();
        $cantidadesDeTelefonos = [];
        $telefonos = [];
        $min = 60000000;
        $max = 79999999;
        $i = 1;
        do {
            $cantidadesDeTelefonos[$i] = mt_rand(1, 2); //se puede tener de 1 a 2 telefonos registrados por persona
            while( count($telefonos) < array_sum($cantidadesDeTelefonos)) {
                $rand = mt_rand($min, $max);
                $telefonos[$rand] = $rand;
            }
            $i++;
        } while ($i <= $cantidadPersonas);

        $i = 1;
        foreach ($cantidadesDeTelefonos as $cantidad)
        {
            for ($j = 0; $j < $cantidad; $j++)
            {
                Telefono::create([
                    'numero' => array_pop($telefonos),
                    'persona_id' => $i
                ]);
            }
            $i++;
        }
    }
}
