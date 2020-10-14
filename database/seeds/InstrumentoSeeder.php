<?php

use App\Core\Models\Instrumento;
use App\Core\Repositories\EstadoTrait;
use App\Core\Repositories\InstrumentoRepository;
use Illuminate\Database\Seeder;

class InstrumentoSeeder extends Seeder
{

    /**
     * traits
     */
    use EstadoTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///aumentar un char: P:prestado, R:reservado, D:disponible
        Instrumento::create([
            'estado' => $this->RECIEN_FABRICADO,
            'precio' => 55,
            'disponibilidad' => 'D',
            'almacen_codigo' => 1,
            'nombre_instrumento_id' => 1,
            'compra_numero' => 1
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 69,
            'disponibilidad' => 'D',
            'almacen_codigo' => 2,
            'nombre_instrumento_id' => 2,
            'compra_numero' => 1
        ]);
        Instrumento::create([
            'estado' => $this->BASTANTE_DESGASTADO,
            'precio' => 80,
            'disponibilidad' => 'D',
            'almacen_codigo' => 3,
            'nombre_instrumento_id' => 3,
            'compra_numero' => 1
        ]);
        Instrumento::create([
            'estado' => $this->CASI_NUEVO,
            'precio' => 225,
            'disponibilidad' => 'D',
            'almacen_codigo' => 4,
            'nombre_instrumento_id' => 4,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->DEPLORABLE,
            'precio' => 523,
            'disponibilidad' => 'D',
            'almacen_codigo' => 5,
            'nombre_instrumento_id' => 5,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 96,
            'disponibilidad' => 'D',
            'almacen_codigo' => 1,
            'nombre_instrumento_id' => 6,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->DEPLORABLE,
            'precio' => 48,
            'disponibilidad' => 'D',
            'almacen_codigo' => 2,
            'nombre_instrumento_id' => 7,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 115,
            'disponibilidad' => 'D',
            'almacen_codigo' => 3,
            'nombre_instrumento_id' => 8,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->RECIEN_FABRICADO,
            'precio' => 220,
            'disponibilidad' => 'D',
            'almacen_codigo' => 4,
            'nombre_instrumento_id' => 9,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->CASI_NUEVO,
            'precio' => 69,
            'disponibilidad' => 'D',
            'almacen_codigo' => 5,
            'nombre_instrumento_id' => 10,
            'compra_numero' => 1
        ]);
        Instrumento::create([
            'estado' => $this->BASTANTE_DESGASTADO,
            'precio' => 85,
            'disponibilidad' => 'D',
            'almacen_codigo' => 1,
            'nombre_instrumento_id' => 11,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 95,
            'disponibilidad' => 'D',
            'almacen_codigo' => 2,
            'nombre_instrumento_id' => 12,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->BASTANTE_DESGASTADO,
            'precio' => 112,
            'disponibilidad' => 'D',
            'almacen_codigo' => 3,
            'nombre_instrumento_id' => 13,
            'compra_numero' => 1
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 226,
            'disponibilidad' => 'D',
            'almacen_codigo' => 4,
            'nombre_instrumento_id' => 14,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->DEPLORABLE,
            'precio' => 236,
            'disponibilidad' => 'D',
            'almacen_codigo' => 5,
            'nombre_instrumento_id' => 15,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 125,
            'disponibilidad' => 'D',
            'almacen_codigo' => 1,
            'nombre_instrumento_id' => 16,
            'compra_numero' => 1
        ]);
        Instrumento::create([
            'estado' => $this->BASTANTE_DESGASTADO,
            'precio' => 623,
            'disponibilidad' => 'D',
            'almacen_codigo' => 2,
            'nombre_instrumento_id' => 17,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->RECIEN_FABRICADO,
            'precio' => 995,
            'disponibilidad' => 'D',
            'almacen_codigo' => 3,
            'nombre_instrumento_id' => 18,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 699,
            'disponibilidad' => 'D',
            'almacen_codigo' => 4,
            'nombre_instrumento_id' => 19,
            'compra_numero' => 1
        ]);
        Instrumento::create([
            'estado' => $this->DEPLORABLE,
            'precio' => 523,
            'disponibilidad' => 'D',
            'almacen_codigo' => 5,
            'nombre_instrumento_id' => 20,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 223,
            'disponibilidad' => 'D',
            'almacen_codigo' => 1,
            'nombre_instrumento_id' => 21,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->CASI_NUEVO,
            'precio' => 255,
            'disponibilidad' => 'D',
            'almacen_codigo' => 2,
            'nombre_instrumento_id' => 1,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->CASI_NUEVO,
            'precio' => 998,
            'disponibilidad' => 'D',
            'almacen_codigo' => 3,
            'nombre_instrumento_id' => 2,
            'compra_numero' => 2
        ]);
        Instrumento::create([
            'estado' => $this->ALGO_DESGASTADO,
            'precio' => 652,
            'disponibilidad' => 'D',
            'almacen_codigo' => 4,
            'nombre_instrumento_id' => 3,
            'compra_numero' => 3
        ]);
        Instrumento::create([
            'estado' => $this->RECIEN_FABRICADO,
            'precio' => 512,
            'disponibilidad' => 'D',
            'almacen_codigo' => 5,
            'nombre_instrumento_id' => 4,
            'compra_numero' => 3
        ]);
    }
}
