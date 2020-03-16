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

Route::get('vista', function () {
    return view('vista');
});

Route::get('Altaclientes', function () {
    return view('Altaclientes');
});

//Route::get('/Altaclientes', 'ClientesController@Altaclientes')->name('Altaclientes');
//Route::POST('/Guardacliente', 'ClientesController@Guardacliente')->name('Guardacliente');

Route::get('/ReporteClientes', 'ClientesController@ReporteClientes')->name('ReporteClientes');

//Bajas y altas logicas    
//Route::get('/eliminaCliente/{idcliente}', 'ClientesController@eliminaCliente')->name('eliminaCliente');  //se manda el idcliente para la modificacion del campo ACTIVO a SI o NO y se muestra en la ruta
//Route::get('/restauraCliente/{idcliente}', 'ClientesController@restauraCliente')->name('restauraCliente');

//Route::get('/modificaCliente/{idcliente}', 'ClientesController@modificaCliente')->name('modificaCliente');
//Route::POST('/editaCliente', 'ClientesController@editaCliente')->name('editaCliente');
