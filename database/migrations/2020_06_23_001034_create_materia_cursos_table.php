<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_cursos', function (Blueprint $table) {
            $table->string('materia_sigla');
            $table->unsignedBigInteger('curso_codigo');
            $table->timestamps();

            $table->primary(['materia_sigla', 'curso_codigo']);

            $table->foreign('materia_sigla')->on('materias')->references('sigla')->cascadeOnDelete();
            $table->foreign('curso_codigo')->on('cursos')->references('codigo')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_cursos');
    }
}
