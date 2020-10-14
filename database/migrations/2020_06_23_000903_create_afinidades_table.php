<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfinidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afinidades', function (Blueprint $table) {
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('especialidad_id');
            $table->timestamps();

            $table->primary(['docente_id', 'especialidad_id']);

            $table->foreign('docente_id')->on('docentes')->references('persona_id')->cascadeOnDelete();
            $table->foreign('especialidad_id')->on('especialidades')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afinidades');
    }
}
