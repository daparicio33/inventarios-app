<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignClienteIdAlmaceneIdToTableMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('almacene_id');
            $table->foreign('cliente_id')->references('idCliente')->on('clientes');
            $table->foreign('almacene_id')->references('id')->on('almacenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            //
            $table->dropForeign('movimientos_cliente_id_foreign');
            $table->dropForeign('movimientos_almacene_id_foreign');
            $table->dropColumn('cliente_id');
            $table->dropColumn('almacene_id');
        });
    }
}
