<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->unsignedBigInteger('nombre_instrumento_id');
            $table->unsignedBigInteger('pedido_numero');
            $table->unsignedTinyInteger('cantidad');
            $table->timestamps();

            $table->primary(['nombre_instrumento_id', 'pedido_numero']);

            $table->foreign('nombre_instrumento_id')->on('nombre_instrumentos')->references('id')->cascadeOnDelete();
            $table->foreign('pedido_numero')->on('pedidos')->references('numero')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
