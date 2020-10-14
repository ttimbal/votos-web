<?php

use App\Core\Repositories\EstadoTrait;
use App\Core\Models\DetalleDevolucion;
use Illuminate\Database\Seeder;

class DetalleDevolucionSeeder extends Seeder
{
    //traits
    use EstadoTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleDevolucion::create([
            'devolucion_id' => 1,
            'instrumento_numero' => 1,
            'estado' => $this->RECIEN_FABRICADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 1,
            'instrumento_numero' => 2,
            'estado' => $this->CASI_NUEVO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 1,
            'instrumento_numero' => 3,
            'estado' => $this->ALGO_DESGASTADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 1,
            'instrumento_numero' => 4,
            'estado' => $this->BASTANTE_DESGASTADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 1,
            'instrumento_numero' => 11,
            'estado' => $this->RECIEN_FABRICADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 1,
            'instrumento_numero' => 14,
            'estado' => $this->BASTANTE_DESGASTADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 2,
            'instrumento_numero' => 5,
            'estado' => $this->DEPLORABLE
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 2,
            'instrumento_numero' => 6,
            'estado' => $this->RECIEN_FABRICADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 2,
            'instrumento_numero' => 7,
            'estado' => $this->CASI_NUEVO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 2,
            'instrumento_numero' => 12,
            'estado' => $this->CASI_NUEVO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 3,
            'instrumento_numero' => 8,
            'estado' => $this->ALGO_DESGASTADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 3,
            'instrumento_numero' => 9,
            'estado' => $this->BASTANTE_DESGASTADO
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 3,
            'instrumento_numero' => 10,
            'estado' => $this->DEPLORABLE
        ]);
        DetalleDevolucion::create([
            'devolucion_id' => 3,
            'instrumento_numero' => 13,
            'estado' => $this->ALGO_DESGASTADO
        ]);
    }
}
