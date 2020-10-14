<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_horarios', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('horario_id');
            $table->timestamps();

            $table->primary(['grupo_id', 'horario_id']);

            $table->foreign('grupo_id')->on('grupos')->references('id')->cascadeOnDelete();
            $table->foreign('horario_id')->on('horarios')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_horarios');
    }
}
