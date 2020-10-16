<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Recinto;

class RecintoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //asiento La Guardia
        Recinto::create([

            'nombre' => 'Esc. Tomas Jose Morales',
            'direccion' => 'La Guardia',
            'cantidad_mesas'=>11,
            'asiento_id' => 1
        ]);
        Recinto::create([

            'nombre' => 'Esc. Jose Vicente Soliz y Ramos',
            'direccion' => 'La Guardia',
            'cantidad_mesas'=>19,
            'asiento_id' => 1
        ]);
        Recinto::create([

            'nombre' => 'U.E. Nataniel Garcia Chavez',
            'direccion' => 'Calle Luisa Reyes S/N Barrio 3 de Mayo',
            'cantidad_mesas'=>4,
            'asiento_id' => 1
        ]);
        Recinto::create([

            'nombre' => 'U.E. Nacional La Guardia',
            'direccion' => 'Av. Doble Vía La Guardia',
            'cantidad_mesas'=>9,
            'asiento_id' => 1
        ]);
        Recinto::create([

            'nombre' => 'U.E. Rvdo. Padre David Machachlan',
            'direccion' => 'Barrio San Jorge',
            'cantidad_mesas'=>1,
            'asiento_id' => 1
        ]);






//asiento simon bolivar
        Recinto::create([

            'nombre' => 'Esc. Central Angel Foianini',
            'direccion' => 'Simón Bolivar',
            'cantidad_mesas'=>27,
            'asiento_id' => 2
        ]);
        Recinto::create([

            'nombre' => 'Escuela Maestro Pitagoras',
            'direccion' => 'Simón Bolivar',
            'cantidad_mesas'=>37,
            'asiento_id' => 2
        ]);



        //asiento peji (Villa Arrien)
        Recinto::create([
            'nombre' => 'Esc. Jose Miguel de Velasco',
            'direccion' => 'Peji (Villa Arrien)',
            'cantidad_mesas'=>2,
            'asiento_id' => 3
        ]);



        //asiento Brecha 3
        Recinto::create([

            'nombre' => 'Esc. La Peña- Brecha-3',
            'direccion' => 'Brecha 3',
            'cantidad_mesas'=>4,
            'asiento_id' => 4
        ]);


        //asiento Basilio
        Recinto::create([

            'nombre' => 'Esc. Central Basilio',
            'direccion' => 'Basilio',
            'cantidad_mesas'=>10,
            'asiento_id' => 5
        ]);



        //asiento Pedro Lorenzo
        Recinto::create([

            'nombre' => 'Escuela Jose Gil Soruco',
            'direccion' => 'Pedro Lorenzo',
            'cantidad_mesas'=>6,
            'asiento_id' => 6
        ]);






//asiento  El Carmen (Ibañez)
        Recinto::create([

            'nombre' => 'Esc. Nataniel Verdugez',
            'direccion' => 'El Carmen (Ibañez)',
            'cantidad_mesas'=>38,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'U.E.  23 de Diciembre',
            'direccion' => 'El Carmen (Ibañez)',
            'cantidad_mesas'=>27,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'Cambao',
            'direccion' => 'Av. Mapaizo Km 3/2',
            'cantidad_mesas'=>13,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'Madre Teresa de Calcuta',
            'direccion' => 'Jardin Valparaiso',
            'cantidad_mesas'=>11,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'U.E. Ayacucho',
            'direccion' => 'Barrio 23 de Octubre',
            'cantidad_mesas'=>4,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'U.E. Cordecruz',
            'direccion' => 'Av. Doble Vía La Guardia',
            'cantidad_mesas'=>16,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'U.E. Jose Mariano Serrano',
            'direccion' => 'Barrio Cherentave',
            'cantidad_mesas'=>13,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'U.E. Tomas Morales Padilla',
            'direccion' => 'Barrio Los Pinos',
            'cantidad_mesas'=>14,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'U.E.  Juan Pablo II EPDB',
            'direccion' => 'Baleon II',
            'cantidad_mesas'=>4,
            'asiento_id' => 7
        ]);
        Recinto::create([

            'nombre' => 'U.E. Hna. Maria del Pilar Mateo',
            'direccion' => 'Barrio Los Pinos',
            'cantidad_mesas'=>2,
            'asiento_id' => 7
        ]);



        //asiento Kilometri doce
        Recinto::create([

            'nombre' => 'U.E. Integracion de las Americas',
            'direccion' => 'B/ Integr. de Las Americas Km 13',
            'cantidad_mesas'=>8,
            'asiento_id' => 8
        ]);
        Recinto::create([

            'nombre' => 'U.E. Barrio Lindo',
            'direccion' => 'Barrio Lindo',
            'cantidad_mesas'=>12,
            'asiento_id' => 8
        ]);
        Recinto::create([

            'nombre' => 'U.E. Angel Foianini Banzer II',
            'direccion' => 'Atrás de La Cerveceria',
            'cantidad_mesas'=>4,
            'asiento_id' => 8
        ]);
        Recinto::create([

            'nombre' => 'U.E. Hernando Zanabria',
            'direccion' => 'Barrio Guardia Nueva Km 14',
            'cantidad_mesas'=>5,
            'asiento_id' => 8
        ]);
        Recinto::create([

            'nombre' => 'U.E. Luz de Esperanza',
            'direccion' => 'Barrio Urb. Nueva Esperanza',
            'cantidad_mesas'=>3,
            'asiento_id' => 8
        ]);
        Recinto::create([

            'nombre' => 'U.E. Bicentenario Arco Iris',
            'direccion' => 'Barrio Arco Iris',
            'cantidad_mesas'=>5,
            'asiento_id' => 8
        ]);
        Recinto::create([

            'nombre' => 'Escuela Nueva Esperanza',
            'direccion' => 'Kilómetro Doce',
            'cantidad_mesas'=>17,
            'asiento_id' => 8
        ]);
        Recinto::create([

            'nombre' => 'Esc. Juana Azurduy de Padilla',
            'direccion' => 'Kilómetro Doce',
            'cantidad_mesas'=>14,
            'asiento_id' => 8
        ]);



        //asiento San José (Ibañez)
        Recinto::create([

            'nombre' => 'Esc. Ruben Dario Soliz',
            'direccion' => 'San José (Ibañez)',
            'cantidad_mesas'=>13,
            'asiento_id' => 9
        ]);
        Recinto::create([

            'nombre' => 'U.E. San Carlos',
            'direccion' => 'San José (Ibañez)',
            'cantidad_mesas'=>2,
            'asiento_id' => 9
        ]);
        Recinto::create([

            'nombre' => 'U.E. Quebrada Seca',
            'direccion' => 'Carretera al Torno',
            'cantidad_mesas'=>2,
            'asiento_id' => 9
        ]);



        //asiento La Guardia
        Recinto::create([

            'nombre' => 'Coliseo de la Guardia (Temporal)',
            'direccion' => 'La Guardia',
            'cantidad_mesas'=>9,
            'asiento_id' => 1
        ]);
    }
}
