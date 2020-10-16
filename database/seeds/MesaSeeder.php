<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Mesa;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=38;$i++)
        {
            $mesa = Mesa::create([
                'nro' => $i
            ]);
        }
    }
}
