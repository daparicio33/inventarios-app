<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->string('descripcion');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('titem_id');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('url')->default('public/items/defaultitem.png');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('titem_id')->references('id')->on('titems');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
        Schema::dropIfExists('items');
    }
}
