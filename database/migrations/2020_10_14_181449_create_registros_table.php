<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->string('descripcion');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mesa_recinto_id');
            $table->unsignedBigInteger('postulante_id');
            $table->timestamps();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('mesa_recinto_id')->on('voto_postulante')->references('mesa_recinto_id')->cascadeOnDelete();
            $table->foreign('postulante_id')->on('voto_postulante')->references('postulante_id')->cascadeOnDelete();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
