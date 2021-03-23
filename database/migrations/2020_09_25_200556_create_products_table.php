<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('ProductoId');
            $table->string('ProductoNombre');
            $table->longText('ProductoDescripcion');
            $table->float('ProductoPrecio', 10, 2);
            $table->unsignedMediumInteger('ProductoCantidad');
            $table->string('ProductoCodigo');
            $table->string('ProductoImage');
            $table->unsignedBigInteger('fk_proveedor');
            $table->foreign('fk_proveedor')->references('ProveedorId')->on('proveedores');
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
        Schema::dropIfExists('productos');
    }
}
