<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaCompraProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_compra_producto', function (Blueprint $table) {
            $table->id('audi_compra_producto_id');
            $table->unsignedSmallInteger('audi_nuevo_compraCantidad');
            $table->float('audi_nuevo_compraSubtotal', 10, 2);
            $table->unsignedBigInteger('audi_nuevo_fk_producto');
            $table->unsignedBigInteger('audi_nuevo_fk_compra');
            $table->unsignedSmallInteger('audi_anterior_compraCantidad');
            $table->float('audi_anterior_compraSubtotal', 10, 2);
            $table->unsignedBigInteger('audi_anterior_fk_producto');
            $table->unsignedBigInteger('audi_anterior_fk_compra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoria_compra_producto');
    }
}
