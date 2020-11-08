<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaPermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_permiso_rol', function (Blueprint $table) {
            $table->id('audi_permiso_rol_id');
            $table->unsignedBigInteger('audi_nuevo_fk_permiso');
            $table->unsignedBigInteger('audi_nuevo_fk_rol');
            $table->unsignedBigInteger('audi_anterior_fk_permiso');
            $table->unsignedBigInteger('audi_anterior_fk_rol');
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
        Schema::dropIfExists('auditoria_permiso_rol');
    }
}
