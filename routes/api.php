<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'docentes', 'middleware' => ['auth:api']],function (){
    Route::get('/','DocenteController@index_api');
    Route::get('/create','DocenteController@create_api');
    Route::post('/','DocenteController@store_api');
    Route::get('/{persona_id}','DocenteController@show_api');
    Route::get('/{persona_id}/edit','DocenteController@edit_api');
    Route::put('/{persona_id}','DocenteController@update_api');
    Route::delete('/{persona_id}','DocenteController@destroy_api');
});

Route::group(['prefix' => 'administrativos', 'middleware' => ['auth:api']],function (){
    Route::get('/','AdministrativoController@index_api');
    Route::get('/create','AdministrativoController@create_api');
    Route::post('/','AdministrativoController@store_api');
    Route::get('/{persona_id}','AdministrativoController@show_api');
    Route::get('/{persona_id}/edit','AdministrativoController@edit_api');
    Route::put('/{persona_id}','AdministrativoController@update_api');
    Route::delete('/{persona_id}','AdministrativoController@destroy_api');
});

Route::group(['prefix' => 'proveedores', 'middleware' => ['auth:api']],function (){
    Route::get('/','ProveedorController@indexApi');
    Route::post('/','ProveedorController@storeApi');
    Route::get('/{persona_id}','ProveedorController@showApi');
    Route::get('/{persona_id}/edit','ProveedorController@editApi');
    Route::put('/{persona_id}','ProveedorController@updateApi');
    Route::delete('/{persona_id}','ProveedorController@destroyApi');
});

Route::group(['prefix' => 'almacenes', 'middleware' => ['auth:api']],function (){
    Route::get('/','AlmacenController@indexApi');
    Route::post('/','AlmacenController@storeApi');
    Route::get('/{codigo}','AlmacenController@showApi');
    Route::get('/{codigo}/edit','AlmacenController@editApi');
    Route::put('/{codigo}','AlmacenController@updateApi');
    Route::delete('/{codigo}','AlmacenController@destroyApi');
});

Route::group(['prefix' => 'pedidos', 'middleware' => ['auth:api']],function (){
    Route::get('/','PedidoController@indexApi');
    Route::get('/create','PedidoController@createApi');
    Route::post('/','PedidoController@storeApi');
    Route::get('/{numero}','PedidoController@showApi');
    Route::get('/{numero}/edit','PedidoController@editApi');
    Route::put('/{numero}','PedidoController@updateApi');
    Route::delete('/{numero}','PedidoController@destroyApi');
});

Route::group(['prefix' => 'prestamos', 'middleware' => ['auth:api']],function (){
    Route::get('/','PrestamoController@indexApi');
    Route::get('/create','PrestamoController@createApi');
    Route::post('/','PrestamoController@storeApi');
    Route::get('/{id}','PrestamoController@showApi');
    Route::get('{id}/edit','PrestamoController@editApi');
    Route::put('/{id}','PrestamoController@updateApi');
    Route::delete('/{id}','PrestamoController@destroyApi');
});

Route::group(['prefix' => 'promociones', 'middleware' => ['auth:api']],function (){
    Route::get('/','PromocionController@indexApi');
    Route::post('/','PromocionController@storeApi');
    Route::get('/{id}','PromocionController@showApi');
    Route::get('/{id}/edit','PromocionController@editApi');
    Route::put('/{id}','PromocionController@updateApi');
    Route::delete('/{id}','PromocionController@destroyApi');
});

Route::group(['prefix' => 'instrumentos', 'middleware' => ['auth:api']],function (){
    Route::get('/','InstrumentoController@indexApi');
    Route::get('/create','InstrumentoController@createApi');
    Route::post('/','InstrumentoController@storeApi');
    Route::get('/{id}','InstrumentoController@showApi');
    Route::get('/{id}/edit','InstrumentoController@editApi');
    Route::put('/{id}','InstrumentoController@updateApi');
    Route::delete('/{id}','InstrumentoController@destroyApi');
});

Route::group(['prefix' => 'cursos', 'middleware' => ['auth:api']],function (){
    Route::get('/','CursoController@indexApi');
    Route::post('/','CursoController@storeApi');
    Route::get('/{codigo}','CursoController@showApi');
    Route::get('/{codigo}/edit','CursoController@editApi');
    Route::put('/{codigo}','CursoController@updateApi');
    Route::delete('/{codigo}','CursoController@destroyApi');
});

/**
 * Login routes
 */
Route::post('login', 'UserController@login');
Route::get('user','UserController@user')->middleware('auth:api');
Route::post('logout','UserController@logout')->middleware('auth:api');

/**
 * agregado
 */
Route::group(['prefix' => 'devoluciones', 'middleware' => ['auth:api']],function (){
    Route::get('/','DevolucionController@indexApi');
});
Route::group(['prefix' => 'horarios', 'middleware' => ['auth:api']],function (){
    Route::get('/','HorarioController@index_api');
});
Route::group(['prefix' => 'grupos', 'middleware' => ['auth:api']],function (){
    Route::get('/{materia_sigla}','GrupoController@index_api');
});
