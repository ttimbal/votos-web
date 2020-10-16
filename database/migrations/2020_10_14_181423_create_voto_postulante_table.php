<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotoPostulanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto_postulante', function (Blueprint $table) {
            $table->unsignedBigInteger('mesa_recinto_id');
            $table->unsignedBigInteger('postulante_id');
            $table->primary(['mesa_recinto_id','postulante_id']);
            $table->unsignedBigInteger('votos');
            $table->timestamps();

            $table->foreign('mesa_recinto_id')->on('mesa_recinto')->references('id')->cascadeOnDelete();
            $table->foreign('postulante_id')->on('postulante')->references('id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voto_postulante');
    }
}
