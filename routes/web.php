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

Route::get('/admin/asignacion', function (){
   return view('admin.asignacion');
});

Route::get('/admin/historial', function (){
    return view('admin.historial');
});

Route::get('/admin/detalle', function (){
   return view('admin.evaluacionDepositos');
});


Route::get('/admin/mes', function (){
    return view('admin.evaluacionMes');
});

Route::get('/admin/depot', function (){
    return view('admin.evaluacionDepot');
});
