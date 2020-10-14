<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->date('fecha_devolver');
            $table->time('hora_devolver');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('administrativo_id');
            $table->timestamps();

            $table->foreign('persona_id')->on('personas')->references('id')->cascadeOnDelete();
            $table->foreign('administrativo_id')->on('administrativos')->references('persona_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
