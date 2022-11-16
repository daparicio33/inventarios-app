<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            /* la migracion falta el usuario y el cliente */
            $table->id();
            $table->integer('numero');
            $table->date('fecha');
            $table->time('hora');
            $table->date('fdevolucion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tmovimiento_id');
            $table->unsignedBigInteger('movimiento_id')->nullable();
            $table->foreign('tmovimiento_id')->references('id')->on('tmovimientos');
            $table->foreign('movimiento_id')->references('id')->on('movimientos');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('movimientos');
    }
}
