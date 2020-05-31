<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_hora');
            $table->String('localizacion');

            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('nutricionista_id');
            $table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('nutricionista_id')->references('id')->on('users');

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
        Schema::dropIfExists('citas');
    }
}
