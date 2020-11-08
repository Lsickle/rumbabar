<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_roles', function (Blueprint $table) {
            $table->id('audi_roles_id');
            $table->unsignedBigInteger('audi_RolId');
            $table->string('audi_nuevo_RolNombre');
            $table->string('audi_anterior_RolNombre');
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
        Schema::dropIfExists('auditoria_roles');
    }
}
