<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_promociones', function (Blueprint $table) {
            $table->string('materia_sigla');
            $table->unsignedBigInteger('promocion_id');
            $table->timestamps();

            $table->primary(['materia_sigla', 'promocion_id']);

            $table->foreign('materia_sigla')->on('materias')->references('sigla')->cascadeOnDelete();
            $table->foreign('promocion_id')->on('promociones')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_promociones');
    }
}
