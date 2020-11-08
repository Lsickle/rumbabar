<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_clientes', function (Blueprint $table) {
            $table->id('audi_clientes_id');
            $table->unsignedBigInteger('audi_ClienteId');
            $table->string('audi_nuevo_ClienteNombre');
            $table->string('audi_nuevo_ClienteDocumento');
            $table->string('audi_anterior_ClienteNombre');
            $table->string('audi_anterior_ClienteDocumento');
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
        Schema::dropIfExists('auditoria_clientes');
    }
}
