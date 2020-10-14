<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20);
            $table->unsignedBigInteger('docente_id');
            $table->string('materia_sigla', 10);
            $table->unsignedBigInteger('periodo_codigo');
            $table->timestamps();

            $table->foreign('docente_id')->on('docentes')->references('persona_id')->cascadeOnDelete();
            $table->foreign('materia_sigla')->on('materias')->references('sigla')->cascadeOnDelete();
            $table->foreign('periodo_codigo')->on('periodos')->references('codigo')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
