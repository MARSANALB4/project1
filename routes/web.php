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
Route::delete('alimentos/destroyAll', 'AlimentoController@destroyAll')->name('alimentos.destroyAll');

Auth::routes();

Route::get('/home', 'HomeController@ivagrndex')->name('home');
Route::resource('citas', 'CitaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('lunes{plan_id}', 'DietaController@lunes')->name('dietas.lunes');
Route::get('martes{plan_id}', 'DietaController@martes')->name('dietas.martes');
Route::get('miercoles{plan_id}', 'DietaController@miercoles')->name('dietas.miercoles');
Route::get('jueves{plan_id}', 'DietaController@jueves')->name('dietas.jueves');
Route::get('viernes{plan_id}', 'DietaController@viernes')->name('dietas.viernes');
Route::get('sabado{plan_id}', 'DietaController@sabado')->name('dietas.sabado');
Route::get('domingo{plan_id}', 'DietaController@domingo')->name('dietas.domingo');
Route::resource('dietas', 'DietaController');


//rutas sólo para nutricionistas
Route::group(['middleware' => 'App\Http\Middleware\NutricionistaMiddleware'], function()
{
    Route::resource('pacientes', 'PacienteController');

    Route::resource('objetivos', 'ObjetivoController');
    Route::resource('especialidades', 'EspecialidadController');
    Route::resource('citas', 'CitaController');
    Route::resource('alimentos', 'AlimentoController');
    Route::resource('platos', 'PlatoController');
    Route::resource('comidas', 'ComidaController');


    Route::resource('plans', 'PlanController');
    Route::resource('mediciones', 'MedicionController');
    Route::resource('analiticas', 'MedicionAnaliticaController');
    Route::resource('antropometricas', 'MedicionAntropometricaController');


});

//rutas sólo para pacientes
Route::group(['middleware' => 'App\Http\Middleware\PacienteMiddleware'], function()
{
    Route::get('/misObjetivos', 'ObjetivoController@indexPaciente')->name('misObjetivos');
    Route::get('/misCitas', 'CitaController@indexPaciente')->name('misCitas');
    Route::get('/misPlanes', 'PlanController@indexPaciente')->name('misPlanes');
    Route::get('/misMediciones', 'MedicionController@indexPaciente')->name('misMediciones');
    Route::get('/misMedicionesAnaliticas', 'MedicionAnaliticaController@indexPaciente')->name('misMedicionesAnaliticas');
    Route::get('/misMedicionesAntropometricas', 'MedicionAntropometricaController@indexPaciente')->name('misMedicionesAntropometricas');


});

