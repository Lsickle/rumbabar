<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_venta', function (Blueprint $table) {
            $table->unsignedSmallInteger('ventaCantidad');
            $table->float('ventaSubtotal', 10, 2);
            $table->unsignedBigInteger('fk_producto');
            $table->foreign('fk_producto')->references('ProductoId')->on('productos');
            $table->unsignedBigInteger('fk_venta');
            $table->foreign('fk_venta')->references('VentaId')->on('ventas');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_venta');
    }
}
