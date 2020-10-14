<?php

use App\Core\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'persona_id' => 4,
            'ciudad' => 'Santa Cruz'
        ]);
        Proveedor::create([
            'persona_id' => 7,
            'ciudad' => 'La Paz'
        ]);
        Proveedor::create([
            'persona_id' => 11,
            'ciudad' => 'Cochabamba'
        ]);
        Proveedor::create([
            'persona_id' => 13,
            'ciudad' => 'Santa Cruz'
        ]);
        Proveedor::create([
            'persona_id' => 14,
            'ciudad' => 'La Paz'
        ]);
    }
}
