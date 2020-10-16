<?php


use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * traits
     */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //registrando todos los docentes
        $personas = \App\Core\Models\Persona::all();

        foreach ($personas as $persona)
        {
            $nuevoUsuario = User::create([
                'name' => $persona->nombre,
                'email' => $persona->correo,
                'email_verified_at' => null,
                'password' => bcrypt('12341234'),
                'persona_id' => $persona->id
            ]);
        }
    }
}
