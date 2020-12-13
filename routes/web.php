<?php

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
Auth::routes(['verify' => false]);

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['web', 'auth', 'verified', 'bindings'])->group(function () {

    // middleware routes

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/compras','CompraController');
    Route::resource('/ventas','VentaController');
    Route::resource('/productos','ProductoController');
    Route::resource('/proveedors','ProveedorController');
	Route::get('/getProduct','ajaxController@getProduct')->name('getProduct');
	Route::put('/addProductVenta/{venta}','ajaxController@addProductVenta')->name('addProductVenta');

});
