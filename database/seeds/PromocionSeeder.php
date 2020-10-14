<?php

use App\Core\Models\Promocion;
use Illuminate\Database\Seeder;

class PromocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promocion::create([
            'nombre' => 'Inicio de clases',
            'fecha_inicio' => '2018-02-10',
            'fecha_fin' => '2018-02-20',
            'descuento' => 10
        ]);
        Promocion::create([
            'nombre' => 'Cursos Nivelacion',
            'fecha_inicio' => '2019-07-10',
            'fecha_fin' => '2018-08-01',
            'descuento' => 15
        ]);
        Promocion::create([
            'nombre' => 'Nuevos Cursos',
            'fecha_inicio' => '2019-07-15',
            'fecha_fin' => '2019-07-20',
            'descuento' => 5
        ]);
        Promocion::create([
            'nombre' => 'Pre inscripción',
            'fecha_inicio' => '2020-01-15',
            'fecha_fin' => '2020-01-20',
            'descuento' => 20
        ]);
        Promocion::create([
            'nombre' => 'Pago Completo',
            'fecha_inicio' => '2020-02-20',
            'fecha_fin' => '2018-02-25',
            'descuento' => 30
        ]);
    }
}
