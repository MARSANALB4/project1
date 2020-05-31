<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->Date('fecha_inicio');
            $table->Date('fecha_fin');
            $table->Integer('calorias');


            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('nutricionista_id');
            $table->foreign('nutricionista_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('plans');
    }
}
