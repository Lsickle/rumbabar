<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_mesas', function (Blueprint $table) {
            $table->id('audi_mesas_id');
            $table->unsignedBigInteger('audi_MesaId');
            $table->unsignedTinyInteger('audi_nuevo_MesaPuestos');
            $table->unsignedTinyInteger('audi_anterior_MesaPuestos');
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
        Schema::dropIfExists('auditoria_mesas');
    }
}
