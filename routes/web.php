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

Route::group(['middleware' => ['csl']], function () {

    //Asignaciones

    Route::get('/adm/asignaciones', 'AsignacionController@index')->name('adm.asignaciones.listar');

    //Autoevaluaciones


    Route::get('/adm/autoevaluaciones/listar/{id}', 'AutoevaluacionAdmController@index')->name('adm.autoevaluaciones.listar');

    Route::get('/adm/autoevaluaciones/ver/{id}', 'AutoevaluacionAdmController@show')->name('adm.autoevaluaciones.ver');



    //Datos 




    Route::get('/adm/datos/mes/{anio}', 'ResultadosController@meses')->name('adm.datos.mes.anio');


    Route::get('/adm/datos/mes/{anio}/{deposito}', 'ResultadosController@datosMeses');


    //DEtalle

    Route::get('/adm/datos/detalleAutoevalucion/{id}', 'ResultadosController@detalleAutoevalucion')->name('adm.datos.detalleAutoevalucion');


    //Grafica de resultados  mes
    Route::get('/adm/datos/resultados/{id}', 'ResultadosController@graficas')->name('adm.datos.resultados');

    Route::get('/adm/datos/resultados/{id}/{region}', 'ResultadosController@graficasRegion')->name('adm.datos.resultados.region');



    //Datos Top

    Route::get('/adm/datos/topMes/{id}', 'ResultadosController@topMes')->name('adm.datos.top.mes');

    Route::get('/adm/datos/topAnio/{anio}', 'ResultadosController@topAnio')->name('adm.datos.top.anio');



    //Ver datos
    Route::get('/adm/datos/menu', 'ResultadosController@menu')->name('adm.datos.menu');

    Route::get('/adm/datos/menu/mes/{anio}', 'ResultadosController@menuMes')->name('adm.datos.menu.mes');

    Route::get('/adm/datos/depositos/{id}', 'ResultadosController@depositos');

    Route::get('/adm/datos/riesgos/{anio}', 'ResultadosController@riesgosGrafica')->name('adm.datos.riesgos');

    Route::get('/adm/datos/riesgos/obtener/{anio}', 'ResultadosController@riesgos')->name('adm.datos.riesgos.Obtener');


    Route::get('/adm/datos/deficiencias/{anio}/{region}', 'ResultadosController@deficiencias')->name('adm.datos.deficiencias');

    Route::get('/adm/datos/def/{anio}/{region}', 'ResultadosController@datosDeficiencias')->name('adm.datos.def');


    //Graficas de riegsos depositos
    Route::get('/adm/datos/deficiencias/mes/{anio}/{region}/{mes}', 'ResultadosController@deficienciasMes')->name('adm.datos.deficiencias.mes');

    //Graficas de riesgos deposito
    Route::get('/adm/datos/deficiencias/depot/{anio}/{mes}/{depot}', 'ResultadosController@deficienciasDepot')->name('adm.datos.deficiencias.depot');
});





Route::group(['middleware' => ['adm']], function () {
    //Asignaciones


    Route::get('/adm/asignaciones/crear', 'AsignacionController@create')->name('adm.asignaciones.crear');

    Route::post('/adm/asignaciones', 'AsignacionController@store')->name('adm.asignaciones.guardar');

    Route::get('/adm/asignaciones/{id}/editar', 'AsignacionController@edit')->name('adm.asignaciones.editar');

    Route::put('/adm/asignaciones/{id}', 'AsignacionController@update')->name('adm.asignaciones.actualizar');

    Route::delete('/adm/asignaciones/{id}', 'AsignacionController@destroy')->name('adm.asignaciones.eliminar');



    //Areas

    Route::get('/adm/areas', 'AreaController@index')->name('adm.areas.listar');

    Route::get('/adm/areas/crear', 'AreaController@create')->name('adm.areas.crear');

    Route::post('/adm/areas', 'AreaController@store')->name('adm.areas.guardar');

    Route::get('/adm/areas/{id}/editar', 'AreaController@edit')->name('adm.areas.editar');

    Route::put('/adm/areas/{id}', 'AreaController@update')->name('adm.areas.actualizar');

    Route::delete('/adm/areas/{id}', 'AreaController@destroy')->name('adm.areas.eliminar');



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


    //Autoevaluaciones

    Route::delete('/adm/autoevaluaciones/{id}', 'AutoevaluacionAdmController@destroy')->name('adm.autoevaluaciones.eliminar');

    Route::post('/adm/autoevaluaciones/notificar', 'AutoevaluacionAdmController@notificar')->name('adm.autoevaluaciones.notificar');

    Route::post('/adm/autoevaluaciones/cancelar', 'AutoevaluacionAdmController@cancelar')->name('adm.autoevaluaciones.cancelar');

    Route::get('/adm/notify/index', 'AutoevaluacionAdmController@mensaje');



    //Evidencias Descargas

    Route::get('/adm/notify/index', 'AutoevaluacionAdmController@mensaje');



    //Evidencias con Zip
    Route::get('/adm/evidencias/descargar/mes/{id}', 'ZipController@descargarMes')->name('adm.evidencias.mes');


    Route::delete('/adm/evidencias/{id}', 'EvidenciaController@delete')->name('adm.evidencias.eliminar.auto');



});



//Descarga de archivos


Route::get('/archivos/descarga/{id}', 'EvidenciaController@descargar')->name('evidencias.descargar');


//Perfil de usuarios

Route::get('/perfil', 'PerfilController@show')->name('perfil.mostrar');

Route::put('/perfil/nombre', 'PerfilController@editName')->name('perfil.editar.nombre');

Route::put('/perfil/contrasenia', 'PerfilController@editPassword')->name('perfil.editar.contrasenia');


Route::get('/archivos/descarga/{id}', 'EvidenciaController@descargar')->name('evidencias.descargar');

//Usuarios

Route::get('/usr/asignaciones', 'AsignacionUsrController@index')->name('usr.asignaciones.listar');




Route::get('/usr/autoevaluaciones/{id}', 'AutoevaluacionController@index')->name('usr.autoevaluaciones.listar');

Route::get('/usr/autoevaluaciones/mostrar/{id}', 'AutoevaluacionController@show')->name('usr.autoevaluaciones.mostrar');

//Route::get('/usr/autoevaluaciones/{autoevaluacion}/{detalle}/editar', 'AutoevaluacionController@edit')->name('usr.autoevaluaciones.editar');


Route::post('/usr/autoevaluaciones/{id}', 'AutoevaluacionController@store')->name('usr.autoevaluaciones.guardar');

Route::get('usr/autoevaluacion/contar/{id}', 'AutoevaluacionController@contar')->name('usr.autoevaluaciones.contar');

Route::get('/usr/detalleAutoevaluaciones/{id}/editar', 'DetalleController@edit')->name('usr.detalle.editar');

Route::put('/usr/detalleAutoevaluaciones/{id}', 'DetalleController@update')->name('usr.detalle.actualizar');

Route::put('/usr/autoevaluaciones/{id}/enviar', 'AutoevaluacionController@update')->name('usr.autoevaluaciones.enviar');








//Asignaciones
Route::get('/usr/evidencias', 'EvidenciaController@index')->name('usr.evidencias.listar');

Route::get('/usr/evidencias/crear', 'EvidenciaController@create')->name('usr.evidencias.crear');

Route::post('/usr/evidencias/{id}/subir', 'EvidenciaController@store')->name('usr.evidencias.guardar');

Route::get('/usr/evidencias/{id}/editar', 'EvidenciaController@edit')->name('usr.evidencias.editar');

Route::put('/usr/evidencias/{id}', 'EvidenciaController@update')->name('usr.evidencias.actualizar');

Route::post('/usr/evidencias/eliminar/{id}', 'EvidenciaController@destroy')->name('usr.evidencias.eliminar');














Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
