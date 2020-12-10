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
    return view('index');
});

Auth::routes();

/**
 * API Routes
 */
Route::get('getUserID', function() {
	return Auth::user()->id;
});

/**
 * FIN API Routes
 */

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Products
 */
Route::get('allProducts', 'ProductController@getProducts');
/**
 * Fin Products
 */

/**
 * Contratados
 */
Route::get('contratadosByCliente/{user_id}', 'ContratadoController@get_contratados_by_clie');
/**
 * Fin Contratados
 */
