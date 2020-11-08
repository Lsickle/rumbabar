<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaProductoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_producto_venta', function (Blueprint $table) {
            $table->id('audi_venta_producto_id');
            $table->unsignedSmallInteger('audi_nuevo_ventaCantidad');
            $table->float('audi_nuevo_ventaSubtotal', 10, 2);
            $table->unsignedBigInteger('audi_nuevo_fk_producto');
            $table->unsignedBigInteger('audi_nuevo_fk_venta');
            $table->unsignedSmallInteger('audi_anterior_ventaCantidad');
            $table->float('audi_anterior_ventaSubtotal', 10, 2);
            $table->unsignedBigInteger('audi_anterior_fk_producto');
            $table->unsignedBigInteger('audi_anterior_fk_venta');
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
        Schema::dropIfExists('auditoria_producto_venta');
    }
}
