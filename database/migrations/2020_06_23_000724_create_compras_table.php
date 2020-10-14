<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('numero');
            $table->date('fecha');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('pedido_numero');
            $table->timestamps();

            $table->foreign('proveedor_id')->on('proveedores')->references('persona_id')->cascadeOnDelete();
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
        Schema::dropIfExists('compras');
    }
}
