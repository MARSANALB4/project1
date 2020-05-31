<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //atributos de las clases hijas Paciente
            $table->string('dni')->nullable();
            $table->Date('edad')->nullable();
            $table->enum('sexo', ['mujer', 'hombre'])->nullable();;
            $table->string('telefono')->nullable();
            $table->string('domicilio')->nullable();
            $table->enum('actividad', ['sedentario', 'pocoActivo',
                'medianamenteActivo', 'muyActivo', 'extraActivo'])->nullable();


            //atributo de las clases hijas NUTRICIONISTA
            $table->unsignedBigInteger('especialidad_id')->nullable();
            $table->foreign('especialidad_id')->references('id')->on('especialidads');



            //atributo para diferenciar el tipo de usuario
            $table->enum('userType', ['nutricionista', 'paciente']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
