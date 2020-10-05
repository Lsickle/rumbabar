<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_proveedores', function (Blueprint $table) {
            $table->id('audi_proveedores_id');
            $table->unsignedBigInteger('audi_ProveedorID');
            $table->string('audi_nuevo_ProveedorNombre');
            $table->string('audi_nuevo_ProveedorNit');
            $table->string('audi_anterior_ProveedorNombre');
            $table->string('audi_anterior_ProveedorNit');
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
        Schema::dropIfExists('auditoria_proveedores');
    }
}
