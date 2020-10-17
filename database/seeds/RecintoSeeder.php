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


        //asiento camiri
        Recinto::create([

            'nombre' => 'Aulas U.A.G.R.M.',
            'direccion' => '',
            'cantidad_mesas'=>19,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Col. Hugo Arteaga',
            'direccion' => '',
            'cantidad_mesas'=>6,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. 12 de Julio',
            'direccion' => '',
            'cantidad_mesas'=>14,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. 16 de Marzo',
            'direccion' => '',
            'cantidad_mesas'=>8,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. 24 de Septiembre',
            'direccion' => '',
            'cantidad_mesas'=>11,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. Aponte J. Manuel O.H. Del Chaco',
            'direccion' => '',
            'cantidad_mesas'=>16,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. Cristiana Evangelica',
            'direccion' => '',
            'cantidad_mesas'=>5,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. Gabriel Rene Moreno',
            'direccion' => '',
            'cantidad_mesas'=>10,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => '',
            'direccion' => '',
            'cantidad_mesas'=>19,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. Jose Castrillo',
            'direccion' => '',
            'cantidad_mesas'=>9,
            'asiento_id' => 10
        ]);
        Recinto::create([

            'nombre' => 'Esc. Niño Jesus',
            'direccion' => '',
            'cantidad_mesas'=>5,
            'asiento_id' => 10
        ]);

        //asiento choreti
        Recinto::create([

            'nombre' => 'U. E. Monseñor Salvatierra',
            'direccion' => '',
            'cantidad_mesas'=>6,
            'asiento_id' => 11
        ]);
        //asiento curundaiti
        Recinto::create([
            'nombre' => 'Esc. Secc. Curundaity',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 12
        ]);
        //asiento el rodeo
        Recinto::create([
            'nombre' => 'Esc. Seccional El Rodeo',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 13
        ]);
        //asiento guirarapa
        Recinto::create([
            'nombre' => 'Esc. Secc. Guirarapo',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 14
        ]);
        //asiento imbochi
        Recinto::create([
            'nombre' => 'Esc. Secc. Imbochi',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 15
        ]);
        //asiento itanamicua
        Recinto::create([
            'nombre' => 'Esc. Central de Itanambikua',
            'direccion' => '',
            'cantidad_mesas'=>4,
            'asiento_id' => 16
        ]);
        //asiento pipi
        Recinto::create([
            'nombre' => 'Esc. Seccional Pipi',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 17
        ]);
        //asiento puente viejo
        Recinto::create([
            'nombre' => 'Esc. Secc. Puente Viejo',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 18
        ]);

//Asientos de cabezas
    //asiento abapo
        Recinto::create([
            'nombre' => 'Esc. Pto. Camacho',
            'direccion' => '',
            'cantidad_mesas'=>13,
            'asiento_id' => 19
        ]);
        //asiento cabezas
        Recinto::create([
            'nombre' => 'Esc. Serafin Rodriguez',
            'direccion' => '',
            'cantidad_mesas'=>12,
            'asiento_id' => 20
        ]);
        //asiento cotoca
        Recinto::create([
            'nombre' => 'Esc. Cotoca (Cordillera)',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 21
        ]);
        //asiento eduardo avaroa

        Recinto::create([
            'nombre' => 'Esc. Eduardo Abaroa',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 22
        ]);
        //asiento el curuchi
        Recinto::create([
            'nombre' => 'Esc. Secc. El Curichi',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 23
        ]);
        //asiento el filo
        Recinto::create([
            'nombre' => 'Esc. Seccional El Filo',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 24
        ]);
        //asiento estacion mora
        Recinto::create([
            'nombre' => 'Esc. 12 de Abril',
            'direccion' => '',
            'cantidad_mesas'=>10,
            'asiento_id' => 25
        ]);
        //asiento loma blanca
        Recinto::create([
            'nombre' => 'U. E. Loma Blanca',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 26
        ]);
        //asiento pampa del coscal
        Recinto::create([
            'nombre' => 'Esc. Pampa Del Coscal',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 27
        ]);
        //asiento pueblo viejo
        Recinto::create([
            'nombre' => 'Esc. Seccional Pueblo Viejo',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 28
        ]);
        //asiento rio seco
        Recinto::create([
            'nombre' => 'Esc. Rio Seco Florida',
            'direccion' => '',
            'cantidad_mesas'=>3,
            'asiento_id' => 29
        ]);
        //asiento san lorenzo brecha 7

        Recinto::create([
            'nombre' => 'Esc. Secc. San Francisco De Asis',
            'direccion' => '',
            'cantidad_mesas'=>3,
            'asiento_id' => 30
        ]);
//asiento santa rosa
        Recinto::create([
            'nombre' => 'Esc. Santa Rosa',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 31
        ]);
        //asiento vaca guzman
        Recinto::create([
            'nombre' => 'U. E. Vaca Guzmán',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 32
        ]);
        //asiento yatirenda
        Recinto::create([
            'nombre' => 'Esc. Yatirenda',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 33
        ]);
        //asiento sanja honda
        Recinto::create([
            'nombre' => 'Esc. Zanja Honda',
            'direccion' => '',
            'cantidad_mesas'=>8,
            'asiento_id' => 34
        ]);









//ASientos de Charagua
        //asiento 25 de mayo
        Recinto::create([
            'nombre' => 'Esc. 25 de Mayo',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 35
        ]);
        //asiento caipepe
        Recinto::create([
            'nombre' => 'Esc. Secc. de Kaipepe',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 36
        ]);
        //asiento charagua
        Recinto::create([
            'nombre' => 'Escuela Central Fe y Alegria',
            'direccion' => '',
            'cantidad_mesas'=>14,
            'asiento_id' => 37
        ]);
        //asiento el espino
        Recinto::create([
            'nombre' => 'Esc. Secc. El Espino',
            'direccion' => '',
            'cantidad_mesas'=>3,
            'asiento_id' => 38
        ]);
        //asiento estacion charagua
        Recinto::create([
            'nombre' => 'Esc. Estacion Charagua',
            'direccion' => '',
            'cantidad_mesas'=>6,
            'asiento_id' => 39
        ]);
        //asiento guarienda nueva
        Recinto::create([
            'nombre' => 'Esc. Secc. Huarirenda Nueva',
            'direccion' => '',
            'cantidad_mesas'=>3,
            'asiento_id' => 40
        ]);
        //asiento isiporenda
        Recinto::create([
            'nombre' => 'Esc. Seccional Isiporenda',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 41
        ]);
        //asiento atatique
        Recinto::create([
            'nombre' => 'Esc. Seccional Itatique',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 42
        ]);
        //asiento iyoi aguarigua
        Recinto::create([
            'nombre' => 'Esc. Central Iyobi',
            'direccion' => '',
            'cantidad_mesas'=>4,
            'asiento_id' => 43
        ]);
        //asiento isoso copere
        Recinto::create([
            'nombre' => 'Esc. Coopere Brecha',
            'direccion' => '',
            'cantidad_mesas'=>3,
            'asiento_id' => 44
        ]);
        //asiento joseravi
        Recinto::create([
            'nombre' => 'U.E. Joseravi',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 45
        ]);










        //asiento la brecha
        Recinto::create([
            'nombre' => 'Esc. Nucleo Escolar La Brecha',
            'direccion' => '',
            'cantidad_mesas'=>4,
            'asiento_id' => 46
        ]);
        //asiento masavi
        Recinto::create([
            'nombre' => 'Esc. Secc. Central Masavi',
            'direccion' => '',
            'cantidad_mesas'=>3,
            'asiento_id' => 47
        ]);
        //asiento nueva esperanza
        Recinto::create([
            'nombre' => 'Esc. Nueva Esperanza',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 48
        ]);
        //asiento okita
        Recinto::create([
            'nombre' => 'Esc. Okita',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 49
        ]);
        //asiento parapeti grande
        Recinto::create([
            'nombre' => 'Esc. Enrique Quintela',
            'direccion' => '',
            'cantidad_mesas'=>4,
            'asiento_id' => 50
        ]);
        //asiento pueblo nuevo
        Recinto::create([
            'nombre' => 'Esc. Pueblo Nuevo Parapeti',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 51
        ]);
        //asiento rancho nuevo
        Recinto::create([
            'nombre' => 'Esc. Secc. Rancho Nuevo',
            'direccion' => '',
            'cantidad_mesas'=>3,
            'asiento_id' => 52
        ]);
        //asiento chipuru
        Recinto::create([
            'nombre' => 'Escuela Seccional Saipuru',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 53
        ]);
        //asiento san francisco
        Recinto::create([
            'nombre' => 'Esc. Seccional San F. de Parapeti',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 54
        ]);
        //asiento san lorenzo
        Recinto::create([
            'nombre' => 'Esc. Seccional San Lorenzo',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 55
        ]);
        //asiento tacobo
        Recinto::create([
            'nombre' => 'Esc. Secc. Tacobo',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 56
        ]);
        //asiento paputa
        Recinto::create([
            'nombre' => 'Esc. Secc. Taputa',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 57
        ]);

//asiento de boyuibe
        //asiento boyuibe
        Recinto::create([
            'nombre' => 'Esc. Central Rafael Pabon',
            'direccion' => '',
            'cantidad_mesas'=>13,
            'asiento_id' => 58
        ]);
        //asiento la ele
        Recinto::create([
            'nombre' => 'Esc. Secc. Choroquetal La Ele',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 59
        ]);
        //asiento pozo del monte
        Recinto::create([
            'nombre' => 'Esc. Secc. Pozo de Monte',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 60
        ]);

//asientos de lagunilla
        //asiento agua grande
        Recinto::create([
            'nombre' => 'U.E. Kereimba',
            'direccion' => '',
            'cantidad_mesas'=>2,
            'asiento_id' => 61
        ]);
        //asiento alto parapeti
        Recinto::create([
            'nombre' => 'Esc. Seccional Alto Parapeti',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 62
        ]);
        //asiento akio
        Recinto::create([
            'nombre' => 'Escuela Seccional Aquio',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 63
        ]);
        //asiento ipati
        Recinto::create([
            'nombre' => 'Esc. Prof. Delfin Arteaga Ipati',
            'direccion' => '',
            'cantidad_mesas'=>4,
            'asiento_id' => 64
        ]);
        //asiento lagunilla
        Recinto::create([
            'nombre' => 'Esc. Lagunillas',
            'direccion' => '',
            'cantidad_mesas'=>7,
            'asiento_id' => 65
        ]);
        //asiento tacete
        Recinto::create([
            'nombre' => 'Esc. Tasete',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 66
        ]);

//asientos de cuevo
        //asiento  cuevo
        Recinto::create([
            'nombre' => 'Esc. Ub. Angel Sandoval',
            'direccion' => '',
            'cantidad_mesas'=>9,
            'asiento_id' => 67
        ]);
        //asiento el arenal
        Recinto::create([
            'nombre' => 'U.E. El Arenal',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 68
        ]);
        //asiento huaraca
        Recinto::create([
            'nombre' => 'Esc. Unidad Seccional Huaraca',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 69
        ]);
        //asiento itacuatia
        Recinto::create([
            'nombre' => 'Esc. Secc. Itakuatia',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 70
        ]);
        //asiento ibicuati
        Recinto::create([
            'nombre' => 'Esc. Unidad Educativa Ivicuati',
            'direccion' => '',
            'cantidad_mesas'=>1,
            'asiento_id' => 71
        ]);





































    }
}
