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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Allbebidas', 'App\Http\Controllers\BebidasController@getAllProducts');   //Retorna todos los productos
Route::get('/getByCategory', 'App\Http\Controllers\BebidasController@getByCategory'); //Retorna los productos por categoria
Route::post('/bebidas/Order', 'App\Http\Controllers\BebidasController@order'); //Retorna los productos acomodados por mayor o menor precio o por nombre Asc o Desc, o Descuento Mayor
Route::get('/bebidas/buscar', 'App\Http\Controllers\BebidasController@search');       //Retorna los productos buscados por nombre

