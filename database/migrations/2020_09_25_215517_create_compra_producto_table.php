<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_producto', function (Blueprint $table) {
            $table->unsignedSmallInteger('compraCantidad');
            $table->float('compraSubtotal', 10, 2);
            $table->unsignedBigInteger('fk_producto');
            $table->foreign('fk_producto')->references('ProductoId')->on('productos');
            $table->unsignedBigInteger('fk_compra');
            $table->foreign('fk_compra')->references('CompraId')->on('compras');
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
        Schema::dropIfExists('compra_producto');
    }
}
