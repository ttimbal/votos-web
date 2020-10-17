<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Asiento;

class AsientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asiento::create([
            'nombre' => 'La Guardia',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Simon Bolivar',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Peji(Villa Arrien)',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Brecha 3',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Basilio',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Pedro Lorenzo',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'El Carmen (Ibañez)',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'Kilómetro Doce',
            'municipio_id' => 1
        ]);
        Asiento::create([
            'nombre' => 'San José (Ibañez)',
            'municipio_id' => 1
        ]);


        //CAMIRI
        Asiento::create([
            'nombre' => 'Camiri',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'Choreti',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'Curundaity',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'El Rodeo',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'Guirarapo',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'Imbochi',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'Itanambikua',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'Pipi',
            'municipio_id' => 2
        ]);
        Asiento::create([
            'nombre' => 'Puente Viejo',
            'municipio_id' => 2
        ]);


//cabezas

        Asiento::create([
            'nombre' => 'Abapó',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Cabezas',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Cotoca',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Eduardo Avaroa',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'El Curichi',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'El Filo',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Estación Mora',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Loma Blanca',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Pampa del Coscal',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Pueblo Viejo (Florida)',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Río Seco Florida',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'San Lorenzo Brecha 7',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Santa Rosa',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Vaca Guzmán',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Yatirenda',
            'municipio_id' => 3
        ]);
        Asiento::create([
            'nombre' => 'Zanja Honda',
            'municipio_id' => 3
        ]);



        //CHARAGUA
        Asiento::create([
            'nombre' => '25 de Mayo',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Caipepe',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Charagua',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'El Espino',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Estación Charagua',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Huarirenda Nueva',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Isiporenda',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Itatique',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Iyovi-Aguarigua',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Izozog/Coopere Brecha Loma(Cap.)',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Joseravi',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'La Brecha',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Masavi',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Nueva Esperanza',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Okita',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Parapetí Grande/San Antonio(Cap.)',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Pueblo Nuevo Parapeti',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Rancho Nuevo',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Saipurú',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'San Francisco',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'San Lorenzo (Cordillera)',
            'municipio_id' => 4
        ]);
        Asiento::create([
            'nombre' => 'Tacobo',
            'municipio_id' => 4
        ]);

        Asiento::create([
            'nombre' => 'Taputá',
            'municipio_id' => 4
        ]);

//Boyuibe
        Asiento::create([
            'nombre' => 'Boyuibe',
            'municipio_id' => 5
        ]);
        Asiento::create([
            'nombre' => 'La Ele',
            'municipio_id' => 5
        ]);

        Asiento::create([
            'nombre' => 'Pozo del Monte',
            'municipio_id' => 5
        ]);


//lAGUNILLAS
        Asiento::create([
            'nombre' => 'Agua Grande',
            'municipio_id' => 6
        ]);
        Asiento::create([
            'nombre' => 'Alto Parapeti',
            'municipio_id' => 6
        ]);
        Asiento::create([
            'nombre' => 'Aquío',
            'municipio_id' => 6
        ]);
        Asiento::create([
            'nombre' => 'Ipati',
            'municipio_id' => 6
        ]);
        Asiento::create([
            'nombre' => 'Lagunillas',
            'municipio_id' => 6
        ]);
        Asiento::create([
            'nombre' => 'Tasete',
            'municipio_id' => 6
        ]);



        //CUEVO
        Asiento::create([
            'nombre' => 'Cuevo',
            'municipio_id' => 7
        ]);
        Asiento::create([
            'nombre' => 'El Arenal',
            'municipio_id' => 7
        ]);
        Asiento::create([
            'nombre' => 'Huaraca',
            'municipio_id' => 7
        ]);
        Asiento::create([
            'nombre' => 'Itakuatia',
            'municipio_id' => 7
        ]);
        Asiento::create([
            'nombre' => 'Ivicuati',
            'municipio_id' => 7
        ]);

























    }
}
