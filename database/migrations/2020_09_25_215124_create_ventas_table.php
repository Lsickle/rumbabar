<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('VentaId');
            $table->float('VentaSaldo', 10, 2);
            $table->float('VentaTotal', 10, 2);
            $table->unsignedBigInteger('fk_user');
            $table->foreign('fk_user')->references('id')->on('users');
            $table->unsignedBigInteger('fk_mesa');
            $table->foreign('fk_mesa')->references('MesaId')->on('mesas');
            $table->unsignedBigInteger('fk_cliente');
            $table->foreign('fk_cliente')->references('ClienteId')->on('clientes');
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
        Schema::dropIfExists('ventas');
    }
}
