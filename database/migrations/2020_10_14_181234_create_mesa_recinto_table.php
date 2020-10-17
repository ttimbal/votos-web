<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesaRecintoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa_recinto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nulos');
            $table->unsignedBigInteger('blancos');
            $table->unsignedBigInteger('recinto_id');
            $table->unsignedBigInteger('mesa_nro');
            $table->boolean('con_votos');
            $table->timestamps();
            $table->foreign('recinto_id')->on('recinto')->references('id')->cascadeOnDelete();
            $table->foreign('mesa_nro')->on('mesa')->references('nro')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesa_recinto');
    }
}
