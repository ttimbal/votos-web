<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reservas', function (Blueprint $table) {
            $table->unsignedBigInteger('instrumento_numero');
            $table->unsignedBigInteger('reserva_id');
            $table->timestamps();

            $table->primary(['instrumento_numero','reserva_id']);

            $table->foreign('reserva_id')->on('reservas')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('detalle_reservas');
    }
}
