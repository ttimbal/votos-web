<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('usuario.index');
    //return view('welcome');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/municipio/{id}', 'AsientoController@index')->name('asientos');
Route::get('/graficos', 'GraficoController@index')->name('graficos');
Route::get('/municipio/{id}/mesas', 'MesaRecintoController@index')->name('mesas');
Route::post('/save/{id}', 'MesaRecintoController@store')->name('guardar');

Route::group(['middleware' => 'auth'], function () {
/*
    Route::group(['prefix' => 'docentes', 'middleware' => ['permission:ver cu docente']], function () {
        Route::get('/','DocenteController@index')->name('docentes.index');
        Route::get('/create','DocenteController@create')->name('docentes.create');
        Route::post('/','DocenteController@store')->name('docentes.store');
        Route::get('/{persona_id}','DocenteController@show')->name('docentes.show');
        Route::get('/{persona_id}/edit','DocenteController@edit')->name('docentes.edit');
        Route::put('/{persona_id}','DocenteController@update')->name('docentes.update');
        Route::delete('/{persona_id}','DocenteController@destroy')->name('docentes.destroy');
    });
*/

});

