<?php

use App\Core\Models\Administrativo;
use App\Core\Models\Docente;
use App\Core\Repositories\CargoAdministrativoTrait;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * traits
     */
    use CargoAdministrativoTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //registrando administrativos
        $administrativos = Administrativo::all();
        $administrativos->load('persona');
        foreach ($administrativos as $administrativo)
        {
            $nuevoUsuario = User::create([
                'name' => $administrativo->persona->nombre,
                'email' => $administrativo->persona->correo,
                'email_verified_at' => null,
                'password' => bcrypt('12341234'),
                'persona_id' => $administrativo->persona->id
            ]);
            switch ($administrativo->cargo) {
                case $this->GERENTE:
                    $nuevoUsuario->assignRole(['Super Admin']);
                    break;
                case $this->SECRETARIA:
                    $nuevoUsuario->assignRole(['Secretaria']);
                    break;
                case $this->ENCARGADO_DE_FINANZAS:
                    $nuevoUsuario->assignRole(['Encargado Finanzas']);
                    break;
                case $this->ENCARGADO_DE_ALMACEN:
                    $nuevoUsuario->assignRole(['Encargado Almacen']);
                    break;
            }
        }

        //registrando todos los docentes
        $docentes = Docente::all();
        $docentes->load('persona');
        foreach ($docentes as $docente)
        {
            $nuevoUsuario = User::create([
                'name' => $docente->persona->nombre,
                'email' => $docente->persona->correo,
                'email_verified_at' => null,
                'password' => bcrypt('12341234'),
                'persona_id' => $docente->persona->id
            ]);
            $nuevoUsuario->assignRole(['Docente']);
        }
    }
}
