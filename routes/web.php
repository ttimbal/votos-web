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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/listarInstrumentos', 'InstrumentoController@disponibles')->name('listar.instrumentos');

    Route::group(['prefix' => 'docentes', 'middleware' => ['permission:ver cu docente']], function () {
        Route::get('/','DocenteController@index')->name('docentes.index');
        Route::get('/create','DocenteController@create')->name('docentes.create');
        Route::post('/','DocenteController@store')->name('docentes.store');
        Route::get('/{persona_id}','DocenteController@show')->name('docentes.show');
        Route::get('/{persona_id}/edit','DocenteController@edit')->name('docentes.edit');
        Route::put('/{persona_id}','DocenteController@update')->name('docentes.update');
        Route::delete('/{persona_id}','DocenteController@destroy')->name('docentes.destroy');
    });

    Route::group(['prefix' => 'administrativos', 'middleware' => ['permission:ver cu administrativo']], function () {
        Route::get('/','AdministrativoController@index')->name('administrativos.index');
        Route::get('/create','AdministrativoController@create')->name('administrativos.create');
        Route::post('/','AdministrativoController@store')->name('administrativos.store');
        Route::get('/{persona_id}','AdministrativoController@show')->name('administrativos.show');
        Route::get('/{persona_id}/edit','AdministrativoController@edit')->name('administrativos.edit');
        Route::put('/{persona_id}','AdministrativoController@update')->name('administrativos.update');
        Route::delete('/{persona_id}','AdministrativoController@destroy')->name('administrativos.destroy');
    });

    Route::group(['prefix' => 'proveedores', 'middleware' => ['permission:ver cu proveedor']], function () {
        Route::get('/','ProveedorController@index')->name('proveedores.index');
        Route::get('/create','ProveedorController@create')->name('proveedores.create');
        Route::post('/','ProveedorController@store')->name('proveedores.store');
        Route::get('/{persona_id}','ProveedorController@show')->name('proveedores.show');
        Route::get('/{persona_id}/edit','ProveedorController@edit')->name('proveedores.edit');
        Route::put('/{persona_id}','ProveedorController@update')->name('proveedores.update');
        Route::delete('/{persona_id}','ProveedorController@destroy')->name('proveedores.destroy');
    });

    Route::group(['prefix' => 'prestamos', 'middleware' => ['permission:ver cu prestamo']], function () {
        Route::get('/','PrestamoController@index')->name('prestamos.index');
        Route::get('/create','PrestamoController@create')->name('prestamos.create');
        Route::post('/','PrestamoController@store')->name('prestamos.store');
        Route::get('/{id}','PrestamoController@show')->name('prestamos.show');
        Route::get('{id}/edit','PrestamoController@edit')->name('prestamos.edit');
        Route::put('/{id}','PrestamoController@update')->name('prestamos.update');
        Route::delete('/{id}','PrestamoController@destroy')->name('prestamos.destroy');
    });


    Route::group(['prefix' => 'devoluciones', 'middleware' => ['permission:ver cu devolucion']], function () {
        Route::get('/','DevolucionController@index')->name('devoluciones.index');
        Route::get('/create','DevolucionController@create')->name('devoluciones.create');
        Route::post('/','DevolucionController@store')->name('devolcuciones.store');
        Route::get('/{id}','DevolucionController@show')->name('devoluciones.show');
        Route::get('/{id}/edit','DevolucionController@edit')->name('devoluciones.edit');
        Route::put('/{id}','DevolucionController@update')->name('devoluciones.update');
        Route::delete('/{id}','DevolucionController@destroy')->name('devoluciones.destroy');
    });
    Route::group(['prefix' => 'reservas', 'middleware' => ['permission:ver cu prestamo']], function () {
        Route::get('/','ReservaController@index')->name('reservas.index');
        Route::get('/create','ReservaController@create')->name('reservas.create');
        Route::post('/','ReservaController@store')->name('reservas.store');
        Route::get('/{id}','ReservaController@show')->name('reservas.show');
        Route::get('{id}/edit','ReservaController@edit')->name('reservas.edit');
        Route::put('/{id}','ReservaController@update')->name('reservas.update');
        Route::delete('/{id}','ReservaController@destroy')->name('reservas.destroy');
    });
    Route::group(['prefix' => 'almacenes', 'middleware' => ['permission:ver cu almacen']], function () {
        Route::get('/','AlmacenController@index')->name('almacenes.index');
        Route::get('/create','AlmacenController@create')->name('almacenes.create');
        Route::post('/','AlmacenController@store')->name('almacenes.store');
        Route::get('/{codigo}','AlmacenController@show')->name('almacenes.show');
        Route::get('/{codigo}/edit','AlmacenController@edit')->name('almacenes.edit');
        Route::put('/{codigo}','AlmacenController@update')->name('almacenes.update');
        Route::delete('/{codigo}','AlmacenController@destroy')->name('almacenes.destroy');
    });

    Route::group(['prefix' => 'instrumentos', 'middleware' => ['permission:ver cu instrumento']], function () {
        Route::get('/','InstrumentoController@index')->name('instrumentos.index');
        Route::get('/create','InstrumentoController@create')->name('instrumentos.create');
        Route::post('/','InstrumentoController@store')->name('instrumentos.store');
        Route::get('/{id}','InstrumentoController@show')->name('instrumentos.show');
        Route::get('/{id}/edit','InstrumentoController@edit')->name('instrumentos.edit');
        Route::put('/{id}','InstrumentoController@update')->name('instrumentos.update');
        Route::delete('/{id}','InstrumentoController@destroy')->name('instrumentos.destroy');
    });

    Route::group(['prefix' => 'pedidos', 'middleware' => ['permission:ver cu pedido']], function () {
        Route::get('/','PedidoController@index')->name('pedidos.index');
        Route::get('/create','PedidoController@create')->name('pedidos.create');
        Route::post('/','PedidoController@store')->name('pedidos.store');
        Route::get('/{numero}','PedidoController@show')->name('pedidos.show');
        Route::get('/{numero}/edit','PedidoController@edit')->name('pedidos.edit');
        Route::put('/{numero}','PedidoController@update')->name('pedidos.update');
        Route::delete('/{numero}','PedidoController@destroy')->name('pedidos.destroy');
    });

    Route::group(['prefix' => 'compras', 'middleware' => ['permission:ver cu compra']], function () {
        Route::get('/','CompraController@index')->name('compras.index');
        Route::get('/create','CompraController@create')->name('compras.create');
        Route::post('/','CompraController@store')->name('compras.store');
        Route::get('/{id}','CompraController@show')->name('compras.show');
        Route::get('/{id}/edit','CompraController@edit')->name('compras.edit');
        Route::put('/{id}','CompraController@update')->name('compras.update');
        Route::delete('/{id}','CompraController@destroy')->name('compras.destroy');
    });

    Route::group(['prefix' => 'especialidades', 'middleware' => ['permission:ver cu especialidad']], function () {
        Route::get('/','EspecialidadController@index')->name('especialidades.index');
        Route::get('/create','EspecialidadController@create')->name('especialidades.create');
        Route::post('/','EspecialidadController@store')->name('especialidades.store');
        Route::get('/{id}','EspecialidadController@show')->name('especialidades.show');
        Route::get('/{id}/edit','EspecialidadController@edit')->name('especialidades.edit');
        Route::put('/{id}','EspecialidadController@update')->name('especialidades.update');
        Route::delete('/{id}','EspecialidadController@destroy')->name('especialidades.destroy');
    });

    Route::group(['prefix' => 'grupos', 'middleware' => ['permission:ver cu grupo']], function () {
        Route::get('/','GrupoController@index')->name('grupos.index');
        Route::get('/create','GrupoController@create')->name('grupos.create');
        Route::post('/','GrupoController@store')->name('grupos.store');
        Route::get('/{id}','GrupoController@show')->name('grupos.show');
        Route::get('/{id}/edit','GrupoController@edit')->name('grupos.edit');
        Route::put('/{id}','GrupoController@update')->name('grupos.update');
        Route::delete('/{id}','GrupoController@destroy')->name('grupos.destroy');
    });

    Route::group(['prefix' => 'asistencias', 'middleware' => ['permission:ver cu asistencia']], function () {
        Route::get('/','AsistenciaController@index')->name('asistencias.index');
        Route::get('/create','AsistenciaController@create')->name('asistencias.create');
        Route::post('/','AsistenciaController@store')->name('asistencias.store');
        Route::get('/{id}','AsistenciaController@show')->name('asistencias.show');
        Route::get('/{id}/edit','AsistenciaController@edit')->name('asistencias.edit');
        Route::put('/{id}','AsistenciaController@update')->name('asistencias.update');
        Route::delete('/{id}','AsistenciaController@destroy')->name('asistencias.destroy');
    });

    Route::group(['prefix' => 'promociones', 'middleware' => ['permission:ver cu promocion']], function () {
        Route::get('/','PromocionController@index')->name('promociones.index');
        Route::get('/create','PromocionController@create')->name('promociones.create');
        Route::post('/','PromocionController@store')->name('promociones.store');
        Route::get('/{id}','PromocionController@show')->name('promociones.show');
        Route::get('/{id}/edit','PromocionController@edit')->name('promociones.edit');
        Route::put('/{id}','PromocionController@update')->name('promociones.update');
        Route::delete('/{id}','PromocionController@destroy')->name('promociones.destroy');
    });

    Route::group(['prefix' => 'cursos', 'middleware' => ['permission:ver cu curso ofertado']], function () {
        Route::get('/','CursoController@index')->name('cursos.index');
        Route::get('/create','CursoController@create')->name('cursos.create');
        Route::post('/','CursoController@store')->name('cursos.store');
        Route::get('/{codigo}','CursoController@show')->name('cursos.show');
        Route::get('/{codigo}/edit','CursoController@edit')->name('cursos.edit');
        Route::put('/{codigo}','CursoController@update')->name('cursos.update');
        Route::delete('/{codigo}','CursoController@destroy')->name('cursos.destroy');
    });

    Route::group(['prefix' => 'materias', 'middleware' => ['permission:ver cu materia']], function () {
        Route::get('/','MateriaController@index')->name('materias.index');
        Route::get('/create','MateriaController@create')->name('materias.create');
        Route::post('/','MateriaController@store')->name('materias.store');
        Route::get('/{sigla}','MateriaController@show')->name('materias.show');
        Route::get('/{sigla}/edit','MateriaController@edit')->name('materias.edit');
        Route::put('/{sigla}','materiaController@update')->name('materias.update');
        Route::delete('/{sigla}','MateriaController@destroy')->name('materias.destroy');
    });

    Route::group(['prefix' => 'horarios', 'middleware' => ['permission:ver cu horario']], function () {
        Route::get('/','HorarioController@index')->name('horarios.index');
        Route::get('/create','HorarioController@create')->name('horarios.create');
        Route::post('/','HorarioController@store')->name('horarios.store');
        Route::get('/{id}','HorarioController@show')->name('horarios.show');
        Route::get('/{id}/edit','HorarioController@edit')->name('horarios.edit');
        Route::put('/{id}','HorarioController@update')->name('horarios.update');
        Route::delete('/{id}','HorarioController@destroy')->name('horarios.destroy');
    });

    Route::group(['prefix' => 'periodos', 'middleware' => ['permission:ver cu periodo']], function () {
        Route::get('/','PeriodoController@index')->name('periodos.index');
        Route::get('/create','PeriodoController@create')->name('periodos.create');
        Route::post('/','PeriodoController@store')->name('periodos.store');
        Route::get('/{codigo}','PeriodoController@show')->name('periodos.show');
        Route::get('/{codigo}/edit','PeriodoController@edit')->name('periodos.edit');
        Route::put('/{codigo}','PeriodoController@update')->name('periodos.update');
        Route::delete('/{codigo}','PeriodoController@destroy')->name('periodos.destroy');
    });

    Route::group(['middleware' => ['role:Super Admin']], function () {
        Route::group(['prefix' => 'usuarios'], function () {
            Route::get('/','UserController@index')->name('usuarios.index');
            Route::get('/create','UserController@create')->name('usuarios.create');
            Route::post('/','UserController@store')->name('usuarios.store');
            Route::get('/{codigo}','UserController@show')->name('usuarios.show');
            Route::get('/{codigo}/edit','UserController@edit')->name('usuarios.edit');
            Route::put('/{codigo}','UserController@update')->name('usuarios.update');
            Route::delete('/{codigo}','UserController@destroy')->name('usuarios.destroy');
        });

        Route::group(['prefix' => 'permisos'], function () {
            Route::get('/','PermisoController@index')->name('permisos.index');
            Route::get('/create','PermisoController@create')->name('permisos.create');
            Route::post('/','PermisoController@store')->name('permisos.store');
            Route::get('/{codigo}','PermisoController@show')->name('permisos.show');
            Route::get('/{codigo}/edit','PermisoController@edit')->name('permisos.edit');
            Route::put('/{codigo}','PermisoController@update')->name('permisos.update');
            Route::delete('/{codigo}','PermisoController@destroy')->name('permisos.destroy');
        });

        Route::group(['prefix' => 'roles'], function () {
            Route::get('/','RolController@index')->name('roles.index');
            Route::get('/create','RolController@create')->name('roles.create');
            Route::post('/','RolController@store')->name('roles.store');
            Route::get('/{codigo}','RolController@show')->name('roles.show');
            Route::get('/{codigo}/edit','RolController@edit')->name('roles.edit');
            Route::put('/{codigo}','RolController@update')->name('roles.update');
            Route::delete('/{codigo}','RolController@destroy')->name('roles.destroy');
        });
    });
});

