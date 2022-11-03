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
            $table->unsignedBigInteger('tmovimiento_id');
            $table->foreign('tmovimiento_id')->references('id')->on('tmovimientos');
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
