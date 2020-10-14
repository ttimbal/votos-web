<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDevolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_devoluciones', function (Blueprint $table) {
            $table->unsignedBigInteger('devolucion_id');
            $table->unsignedBigInteger('instrumento_numero');
            $table->string('estado', 20);
            $table->timestamps();

            $table->primary(['devolucion_id', 'instrumento_numero']);

            $table->foreign('devolucion_id')->on('devoluciones')->references('id')->cascadeOnDelete();
            $table->foreign('instrumento_numero')->on('instrumentos')->references('numero')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_devoluciones');
    }
}
