<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_productos', function (Blueprint $table) {
            $table->id('audi_productos_id');
            $table->unsignedBigInteger('audi_ProductoId');
            $table->string('audi_nuevo_ProductoNombre');
            $table->longText('audi_nuevo_ProductoDescripcion');
            $table->float('audi_nuevo_ProductoPrecio', 10, 2);
            $table->unsignedMediumInteger('audi_nuevo_ProductoCantidad');
            $table->unsignedBigInteger('audi_nuevo_fk_proveedor');
            $table->string('audi_anterior_ProductoNombre');
            $table->longText('audi_anterior_ProductoDescripcion');
            $table->float('audi_anterior_ProductoPrecio', 10, 2);
            $table->unsignedMediumInteger('audi_anterior_ProductoCantidad');
            $table->unsignedBigInteger('audi_anterior_fk_proveedor');
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
        Schema::dropIfExists('auditoria_productos');
    }
}
