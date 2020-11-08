<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_permisos', function (Blueprint $table) {
            $table->id('audi_permisos_id');
            $table->unsignedBigInteger('audi_PermisoId');
            $table->string('audi_nuevo_PermisoNombre');
            $table->string('audi_anterior_PermisoNombre');
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
        Schema::dropIfExists('auditoria_permisos');
    }
}
