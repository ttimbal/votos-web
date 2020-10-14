<?php

use App\Core\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'id' => 1,
            'nombre' => 'Joaquin Chumacero',
            'direccion' => 'Av/Alemana C/mutualista',
            'activo' => true,
            'correo' => 'joaquin@gmail.com',
            'ci_nit' => 9794100
        ]);
        Persona::create([
            'id' => 2,
            'nombre' => 'Fabiola Mendez',
            'direccion' => 'Av/Beni',
            'activo' => false,
            'correo' => 'fabiola@gmail.com',
            'ci_nit' => 9725600
        ]);
        Persona::create([
            'id' => 3,
            'nombre' => 'Carlos Camacho',
            'direccion' => '3er Anillo y Mutualista',
            'activo' => true,
            'correo' => 'carlos@gmail.com',
            'ci_nit' => 1544100
        ]);
        Persona::create([
            'id' => 4,
            'nombre' => 'Roberto Carlos',
            'direccion' => '3 pasos al frente',
            'activo' => true,
            'correo' => 'roberto@gmail.com',
            'ci_nit' => 9796524
        ]);
        Persona::create([
            'id' => 5,
            'nombre' => 'Manuel Gonzales',
            'direccion' => 'Cambodromo 5to anillo',
            'activo' => true,
            'correo' => 'manuel@gmail.com',
            'ci_nit' => 6708465
        ]);
        Persona::create([
            'id' => 6,
            'nombre' => 'Pedro Gomez',
            'direccion' => 'Almenana 5to anillo',
            'activo' => false,
            'correo' => 'pedro@gmail.com',
            'ci_nit' => 1125516
        ]);
        Persona::create([
            'id' => 7,
            'nombre' => 'Antonio Fernandez',
            'direccion' => 'Av/Lasalle 5to anillo',
            'activo' => true,
            'correo' => 'antonio@gmail.com',
            'ci_nit' => 9087866
        ]);
        Persona::create([
            'id' => 8,
            'nombre' => 'Javier jimenez',
            'direccion' => 'Av/Piraí y 2do anillo',
            'activo' => true,
            'correo' => 'javier@gmail.com',
            'ci_nit' => 6715529
        ]);
        Persona::create([
            'id' => 9,
            'nombre' => 'David Gamarra',
            'direccion' => 'Av/Argentina C/chavez',
            'activo' => false,
            'correo' => 'david@gmail.com',
            'ci_nit' => 5272277
        ]);
        Persona::create([
            'id' => 10,
            'nombre' => 'Jose Luis Navarro',
            'direccion' => 'Av/Santa Cruz C/San Pablo',
            'activo' => true,
            'correo' => 'jose@gmail.com',
            'ci_nit' => 3199830
        ]);
        Persona::create([
            'id' => 11,
            'nombre' => 'Maria Rodríguez',
            'direccion' => '2do anillo C/charcas',
            'activo' => false,
            'correo' => 'maria@gmail.com',
            'ci_nit' => 8974752
        ]);
        Persona::create([
            'id' => 12,
            'nombre' => 'Nathalia Gonzales',
            'direccion' => 'Av/ 3er anilo interno calle Tocomechi',
            'activo' => true,
            'correo' => 'nathalia@gmail.com',
            'ci_nit' => 7072770
        ]);
        Persona::create([
            'id' => 13,
            'nombre' => 'Carmen Lopez',
            'direccion' => 'Avenida Hernando Sanabria C/Santos Ortiz',
            'activo' => true,
            'correo' => 'carmen@gmail.com',
            'ci_nit' => 4043606
        ]);
        Persona::create([
            'id' => 14,
            'nombre' => 'Dolores Diaz',
            'direccion' => 'Alemana 5to anillo',
            'activo' => false,
            'correo' => 'dolores@gmail.com',
            'ci_nit' => 7174835
        ]);
        Persona::create([
            'id' => 15,
            'nombre' => 'Ana Muñoz',
            'direccion' => 'Av/ cañoto C/21 de mayo',
            'activo' => true,
            'correo' => 'ana@gmail.com',
            'ci_nit' => 2243646
        ]);
        Persona::create([
            'id' => 16,
            'nombre' => 'Laura Fermandez',
            'direccion' => 'Av/ cañoto C/españa',
            'activo' => true,
            'correo' => 'laura@gmail.com',
            'ci_nit' => 3033335
        ]);
        Persona::create([
            'id' => 17,
            'nombre' => 'Raquel Mejia',
            'direccion' => 'Cambodromo 6to anillo',
            'activo' => true,
            'correo' => 'raquel@gmail.com',
            'ci_nit' => 9546138
        ]);
        Persona::create([
            'id' => 18,
            'nombre' => 'Irene Rodríguez',
            'direccion' => 'Av/Beni calle 6',
            'activo' => true,
            'correo' => 'irene@gmail.com',
            'ci_nit' => 2769241
        ]);
        Persona::create([
            'id' => 19,
            'nombre' => 'Angelica Roca',
            'direccion' => 'Av/ Radial 27 calle 7',
            'activo' => false,
            'correo' => 'angelica@gmail.com',
            'ci_nit' => 4441637
        ]);
        Persona::create([
            'id' => 20,
            'nombre' => 'Anita Ramirez',
            'direccion' => 'Av/Radial 26 C/Santiago',
            'activo' => true,
            'correo' => 'anita@gmail.com',
            'ci_nit' => 9712521
        ]);
        Persona::create([
            'id' => 21,
            'nombre' => 'Rocio torrez',
            'direccion' => 'Av/La Salle Calle Jaime Mendoza',
            'activo' => false,
            'correo' => 'rocio@gmail.com',
            'ci_nit' => 9927285
        ]);

        $faker = Faker\Factory::create();
        for ($i = 22; $i <= 50; $i++)
        {
            Persona::create([
                'id' => $i,
                'nombre' => $faker->unique()->name,
                'direccion' => $faker->unique()->address,
                'activo' => rand(0,1) == 1,
                'correo' => $faker->email,
                'ci_nit' => rand(8000000, 9999999)
            ]);
        }
    }
}
