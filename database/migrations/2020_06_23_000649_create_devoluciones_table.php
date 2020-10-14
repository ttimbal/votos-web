<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('administrativo_id');
            $table->unsignedBigInteger('prestamo_id');
            $table->timestamps();

            $table->foreign('persona_id')->on('personas')->references('id')->cascadeOnDelete();
            $table->foreign('administrativo_id')->on('administrativos')->references('persona_id')->cascadeOnDelete();
            $table->foreign('prestamo_id')->on('prestamos')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoluciones');
    }
}
