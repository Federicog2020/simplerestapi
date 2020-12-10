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

// LOGIN
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

//PRODUCT
Route::get('product/index', 'ProductController@index')->middleware('apiAuth');
Route::post('product/store', 'ProductController@store')->middleware('apiAuth');
Route::put('product/update/{id}', 'ProductController@update')->middleware('apiAuth');
Route::delete('product/destroy/{id}', 'ProductController@destroy')->middleware('apiAuth');
Route::get('product/show/{id}', 'ProductController@show')->middleware('apiAuth');

//EMPRESAS
Route::get('empresa/showAllByUser', 'EmpresaController@showAllByUser')->middleware('apiAuth');
Route::get('empresa/showById', 'EmpresaController@showById')->middleware('apiAuth');
Route::post('empresa/store', 'EmpresaController@store')->middleware('apiAuth');

//CONDIVA
Route::get('condiva/showAll', 'IvaCondicionController@getAll')->middleware('apiAuth');

//PROVINCIAS
Route::get('provincia/getAll', 'ProvinciaController@getAll')->middleware('apiAuth');