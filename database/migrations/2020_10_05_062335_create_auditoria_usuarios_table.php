<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_usuarios', function (Blueprint $table) {
            $table->id('audi_usuarios_id');
            $table->unsignedBigInteger('audi_UsuarioId');
            $table->string('audi_nuevo_UsuarioName');
            $table->string('audi_nuevo_UsuarioEmail');
            $table->string('audi_nuevo_UsuarioPassword');
            $table->unsignedBigInteger('audi_nuevo_fk_rol');
            $table->string('audi_anterior_UsuarioName');
            $table->string('audi_anterior_UsuarioEmail');
            $table->string('audi_anterior_UsuarioPassword');
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
        Schema::dropIfExists('auditoria_usuarios');
    }
}
