<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('TipoComida', ['desayuno', 'mediaMañana','almuerzo','merienda','cena']);

            $table->unsignedBigInteger('plato_id');
            $table->foreign('plato_id')->references('id')->on('platos')->onDelete('cascade');
            $table->Integer('calorias');
            $table->string('name');

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
        Schema::dropIfExists('comidas');
    }
}
