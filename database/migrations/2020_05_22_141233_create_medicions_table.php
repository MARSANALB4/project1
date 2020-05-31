<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicions', function (Blueprint $table) {
            $table->bigIncrements('id');

            //comunes
            $table->Date('fecha');

            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('TipoMedicion', ['antropometrica', 'analitica']);

            //Antropometrica
            $table->Integer('peso')->nullable();
            $table->Integer('altura')->nullable();

            $table->Integer('perímetroCadera')->nullable();
            $table->Integer('perimetroCintura')->nullable();

            $table->Integer('perimetroCuello')->nullable();
            $table->Integer('pcAdominal')->nullable();
            $table->Integer('pcAxilarMedio')->nullable();
            $table->Integer('pcPectoral')->nullable();
            $table->Integer('pcSubescapular')->nullable();
            $table->Integer('pcSuprailiaco')->nullable();

            $table->Integer('pcTricipital')->nullable();
            $table->Integer('pcMuslo')->nullable();
            $table->Float('imc')->nullable();



            //Analitica
            $table->Integer('hdl')->nullable();
            $table->Integer('ldl')->nullable();
            $table->Integer('colesterol')->nullable();
            $table->Integer('pADiastolica')->nullable();
            $table->Integer('pASistolica')->nullable();
            $table->Integer('trigliceridos')->nullable();


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
        Schema::dropIfExists('medicions');
    }
}
