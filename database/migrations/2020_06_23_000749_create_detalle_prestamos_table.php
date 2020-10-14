<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_prestamos', function (Blueprint $table) {
            $table->unsignedBigInteger('prestamo_id');
            $table->unsignedBigInteger('instrumento_numero');
            $table->string('estado', 20);
            $table->timestamps();

            $table->primary(['prestamo_id', 'instrumento_numero']);

            $table->foreign('prestamo_id')->on('prestamos')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('detalle_prestamos');
    }
}
