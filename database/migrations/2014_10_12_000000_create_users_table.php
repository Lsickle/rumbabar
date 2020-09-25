<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('UsuarioId');
            $table->string('UsuarioName');
            $table->string('UsuarioEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('UsuarioPassword');
            $table->unsignedBigInteger('fk_rol');
            $table->foreign('fk_rol')->references('RolId')->on('roles');
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}