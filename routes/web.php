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


Route::get('/', function () {
    return view('welcome');
});

//Areas

Route::get('/adm/areas', 'AreaController@index')->name('adm.areas.listar');

Route::get('/adm/areas/crear', 'AreaController@create')->name('adm.areas.crear');

Route::post('/adm/areas', 'AreaController@store')->name('adm.areas.guardar');

Route::get('/adm/areas/{id}/editar', 'AreaController@edit')->name('adm.areas.editar');

Route::put('/adm/areas/{id}', 'AreaController@update')->name('adm.areas.actualizar');

Route::delete('/adm/areas/{id}', 'AreaController@destroy')->name('adm.areas.eliminar');



//Asignaciones
Route::get('/adm/asignaciones', 'AsignacionController@index')->name('adm.asignaciones.listar');

Route::get('/adm/asignaciones/crear', 'AsignacionController@create')->name('adm.asignaciones.crear');

Route::post('/adm/asignaciones', 'AsignacionController@store')->name('adm.asignaciones.guardar');

Route::get('/adm/asignaciones/{id}/editar', 'AsignacionController@edit')->name('adm.asignaciones.editar');

Route::put('/adm/asignaciones/{id}', 'AsignacionController@update')->name('adm.asignaciones.actualizar');

Route::delete('/adm/asignaciones/{id}', 'AsignacionController@destroy')->name('adm.asignaciones.eliminar');



//Controles

Route::get('/adm/controles', 'ControlController@index')->name('adm.controles.listar');

Route::get('/adm/controles/crear', 'ControlController@create')->name('adm.controles.crear');

Route::post('/adm/controles', 'ControlController@store')->name('adm.controles.guardar');

Route::get('/adm/controles/{id}', 'ControlController@show')->name('adm.controles.ver');

Route::get('/adm/controles/{id}/editar', 'ControlController@edit')->name('adm.controles.editar');

Route::put('/adm/controles/{id}', 'ControlController@update')->name('adm.controles.actualizar');

Route::delete('/adm/controles/{id}', 'ControlController@destroy')->name('adm.controles.eliminar');


//Usuarios


Route::get('/adm/usuarios', 'UsuarioController@index')->name('adm.usuarios.listar');

Route::get('/adm/usuarios/crear', 'UsuarioController@create')->name('adm.usuarios.crear');

Route::post('/adm/usuarios', 'UsuarioController@store')->name('adm.usuarios.guardar');

Route::get('/adm/usuarios/{id}/editar', 'UsuarioController@edit')->name('adm.usuarios.editar');

Route::put('/adm/usuarios/{id}', 'UsuarioController@update')->name('adm.usuarios.actualizar');

Route::delete('/adm/usuarios/{id}', 'UsuarioController@destroy')->name('adm.usuarios.eliminar');


//Depositos

Route::get('/adm/depositos', 'DepositoController@index')->name('adm.depositos.listar');

Route::get('/adm/depositos/crear', 'DepositoController@create')->name('adm.depositos.crear');

Route::post('/adm/depositos', 'DepositoController@store')->name('adm.depositos.guardar');

Route::get('/adm/depositos/{id}/editar', 'DepositoController@edit')->name('adm.depositos.editar');

Route::put('/adm/depositos/{id}', 'DepositoController@update')->name('adm.depositos.actualizar');

Route::delete('/adm/depositos/{id}', 'DepositoController@destroy')->name('adm.depositos.eliminar');


//Responsables


Route::get('/usr/responsables', 'ResponsableController@index')->name('usr.responsables.listar');

Route::get('/usr/responsables/crear', 'ResponsableController@create')->name('usr.responsables.crear');

Route::post('/usr/responsables', 'ResponsableController@store')->name('usr.responsables.guardar');

Route::get('/usr/responsables/{id}/editar', 'ResponsableController@edit')->name('usr.responsables.editar');

Route::put('/usr/responsables/{id}', 'ResponsableController@update')->name('usr.responsables.actualizar');

Route::delete('/usr/responsables/{id}', 'ResponsableController@destroy')->name('usr.responsables.eliminar');







Route::get('/adm/autoevaluaciones/listar', function () {
    return view('adm.autoevaluaciones.listar');
})->name('adm.autoevaluaciones.listar');

Route::get('/adm/autoevaluaciones/ver', function () {
    return view('adm.autoevaluaciones.ver');
})->name('adm.autoevaluaciones.ver');

Route::get('/adm/autoevaluaciones/detalle', function () {
    return view('adm.autoevaluaciones.detalle');
})->name('adm.autoevaluaciones.detalle');







Route::get('/adm/datos/deficiencias', function () {
    return view('adm.datos.deficiencias');
})->name('adm.datos.deficiencias');

Route::get('/adm/datos/depositos', function () {
    return view('adm.datos.depositos');
})->name('adm.datos.depositos');


Route::get('/adm/datos/mes', function () {
    return view('adm.datos.mes');
})->name('adm.datos.mes');


Route::get('/adm/datos/resultados', function () {
    return view('adm.datos.resultados');
})->name('adm.datos.resultados');

Route::get('/adm/datos/riesgos', function () {
    return view('adm.datos.riesgos');
})->name('adm.datos.riesgos');




Route::get('/usr/asignaciones', 'AsignacionUsrController@index')->name('usr.asignaciones.listar');


Route::get('/usr/detalle/editar', function () {
    return view('usr.asignaciones.ver');
})->name('usr.asignaciones.ver');






Route::get('/usr/autoevaluaciones/{id}', 'AutoevaluacionController@index')->name('usr.autoevaluaciones.listar');

//Route::get('/usr/autoevaluaciones/{autoevaluacion}/{detalle}/editar', 'AutoevaluacionController@edit')->name('usr.autoevaluaciones.editar');


Route::post('/usr/autoevaluaciones/{id}', 'AutoevaluacionController@store')->name('usr.autoevaluaciones.guardar');





Route::post('/usr/detalleAutoevaluaciones/{autoevaluacion}/{control}', 'DetalleController@store')->name('usr.detalle.guardar');

Route::get('/usr/detalleAutoevaluaciones/{id}/editar', 'DetalleController@edit')->name('usr.detalle.editar');


Route::get('/usr/autoevaluaciones/ver/ya', function () {
    return view('usr.autoevaluaciones.ver');
})->name('usr.autoevaluaciones.ver');




Route::get('/usr/autoevaluaciones/ver/ya', function () {
    return view('usr.autoevaluaciones.ver');
})->name('usr.autoevaluaciones.ver');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
