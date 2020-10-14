<?php

use App\Core\Models\DetallePromocion;
use Illuminate\Database\Seeder;

class DetallePromocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetallePromocion::create([
            'materia_sigla' => 'GUI-101',
            'promocion_id' => 1
        ]);
        DetallePromocion::create([
            'materia_sigla' => 'GUI-102',
            'promocion_id' => 2
        ]);
        DetallePromocion::create([
            'materia_sigla' => 'PIA-101',
            'promocion_id' => 3
        ]);
    }
}
