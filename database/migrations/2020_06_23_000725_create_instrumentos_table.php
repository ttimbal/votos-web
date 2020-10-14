<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumentos', function (Blueprint $table) {
            $table->id('numero');
            $table->string('estado',20);
            $table->float('precio');
            $table->char('disponibilidad'); ///aumentar un char: P:prestado, R:reservado, D:disponible
            $table->unsignedBigInteger('almacen_codigo');
            $table->unsignedBigInteger('nombre_instrumento_id');
            $table->unsignedBigInteger('compra_numero');
            $table->timestamps();

            $table->foreign('almacen_codigo')->on('almacenes')->references('codigo')->cascadeOnDelete();
            $table->foreign('nombre_instrumento_id')->on('nombre_instrumentos')->references('id')->cascadeOnDelete();
            $table->foreign('compra_numero')->on('compras')->references('numero')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrumentos');
    }
}
