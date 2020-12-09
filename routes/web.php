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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/ventas', function () {
    return view('ventas');
})->name('ventas');

Route::get('/nuevaventa', function () {
    return view('nuevaventa');
})->name('nuevaventa');

Route::get('/compras', function () {
    return view('compras');
})->name('compras');

Route::get('/nuevacompra', function () {
    return view('nuevacompra');
})->name('nuevacompra');

Route::get('/nuevoproducto', function () {
    return view('nuevoproducto');
})->name('nuevoproducto');

Route::get('/proveedores', 'ProveedorController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
