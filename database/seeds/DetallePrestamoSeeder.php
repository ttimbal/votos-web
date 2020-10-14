<?php

use App\Core\Models\DetallePrestamo;
use App\Core\Repositories\EstadoTrait;
use Illuminate\Database\Seeder;

class DetallePrestamoSeeder extends Seeder
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
        DetallePrestamo::create([
            'prestamo_id' => 1,
            'instrumento_numero' => 1,
            'estado' => $this->RECIEN_FABRICADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 1,
            'instrumento_numero' => 2,
            'estado' => $this->CASI_NUEVO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 1,
            'instrumento_numero' => 3,
            'estado' => $this->ALGO_DESGASTADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 1,
            'instrumento_numero' => 4,
            'estado' => $this->BASTANTE_DESGASTADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 2,
            'instrumento_numero' => 5,
            'estado' => $this->DEPLORABLE
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 2,
            'instrumento_numero' => 6,
            'estado' => $this->RECIEN_FABRICADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 2,
            'instrumento_numero' => 7,
            'estado' => $this->CASI_NUEVO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 3,
            'instrumento_numero' => 8,
            'estado' => $this->ALGO_DESGASTADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 3,
            'instrumento_numero' => 9,
            'estado' => $this->BASTANTE_DESGASTADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 3,
            'instrumento_numero' => 10,
            'estado' => $this->DEPLORABLE
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 1,
            'instrumento_numero' => 11,
            'estado' => $this->RECIEN_FABRICADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 2,
            'instrumento_numero' => 12,
            'estado' => $this->CASI_NUEVO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 3,
            'instrumento_numero' => 13,
            'estado' => $this->ALGO_DESGASTADO
        ]);
        DetallePrestamo::create([
            'prestamo_id' => 1,
            'instrumento_numero' => 14,
            'estado' => $this->BASTANTE_DESGASTADO
        ]);
    }
}
