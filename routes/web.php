<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Poner las acciones definidas por el programador antes del CRUD por defecto que monta Laravel
Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');
Route::delete('objetivos/destroyAll', 'ObjetivoController@destroyAll')->name('objetivos.destroyAll');
Route::resource('objetivos', 'ObjetivoController');
Route::resource('citas', 'CitaController');


Auth::routes();

Route::get('/home', 'HomeController@ivagrndex')->name('home');
Route::resource('citas', 'CitaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rutas sólo para nutricionistas
Route::group(['middleware' => 'App\Http\Middleware\NutricionistaMiddleware'], function()
{
    Route::resource('objetivos', 'ObjetivoController');
    Route::resource('especialidades', 'EspecialidadController');
    Route::resource('citas', 'CitaController');


});

//rutas sólo para pacientes
Route::group(['middleware' => 'App\Http\Middleware\PacienteMiddleware'], function()
{
    Route::get('/misObjetivos', 'ObjetivoController@indexPaciente')->name('misObjetivos');
    Route::get('/misCitas', 'CitaController@indexPaciente')->name('misCitas');

});

