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
    return redirect()->route('home');
});


Route::middleware(['web', 'auth', 'verified', 'bindings'])->group(function () {

    // middleware routes

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/compras','CompraController');
    Route::resource('/ventas','VentaController');
    Route::resource('/productos','ProductoController');
    Route::resource('/proveedors','ProveedorController');
    Route::resource('/mesas','MesaController');
    Route::resource('/clientes','ClienteController');
    Route::resource('/usuarios','UsuarioController');
    Route::resource('/roles','RolController');
    Route::get('/reportes','ReporteController@dashboard')->name('reportes.dashboard');
	Route::get('/getProduct','ajaxController@getProduct')->name('getProduct');
	Route::put('/addProductVenta/{venta}','ajaxController@addProductVenta')->name('addProductVenta');
	Route::get('/filterproducts','ajaxController@filterProducts')->name('filterProducts');
	Route::put('/addproductcompra/{compra}','ajaxController@addProductCompra')->name('addProductCompra');

});
