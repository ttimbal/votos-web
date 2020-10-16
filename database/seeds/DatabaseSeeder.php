<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PersonaSeeder::class,
            UserSeeder::class,
            CircunscripcionSeeder::class,
            MunicipioSeeder::class,
            AsientoSeeder::class,
            RecintoSeeder::class,
            MesaSeeder::class,
            MesaRecintoSeeder::class,
            PartidoSeeder::class,
            PostulanteSeeder::class

        ]);
      /*  $this->call([
            PermisoSeeder::class,

            RolPermisoSeeder::class,
            ]);*/
    }
}
