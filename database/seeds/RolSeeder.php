<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Docente'
        ]);
        Role::create([
            'name' => 'Secretaria'
        ]);
        Role::create([
            'name' => 'Encargado Almacen'
        ]);
        Role::create([
            'name' => 'Encargado Finanzas'
        ]);
        Role::create([
            'name' => 'Super Admin'
        ]);
    }
}
