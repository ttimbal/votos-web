<?php

use App\Core\Models\Almacen;
use App\Core\Traits\HavlaSeederTrait;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{

    use HavlaSeederTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Almacen::create([
            'nombre' => 'Almacen 1',
            'ubicacion' => 'Instituto Havla'
        ]);

        $faker = Faker\Factory::create();
        for ($i = 2; $i <= $this->cantidadDeAlmacenes; $i++)
        {
            Almacen::create([
                'nombre' => 'Almacen '.$i,
                'ubicacion' => $faker->streetAddress
            ]);
        }
    }
}
