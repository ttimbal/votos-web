<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_bitacoras', function (Blueprint $table) {
            $table->id();
            $table->DateTime('hora',0);
            $table->string('accion',40);
            $table->unsignedBigInteger('bitacora_id');
            $table->timestamps();

            $table->foreign('bitacora_id')->on('bitacoras')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_bitacoras');
    }
}
