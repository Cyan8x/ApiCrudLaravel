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

//? RUTAS DE MARCAS
Route::get("/marcas","App\Http\Controllers\MarcaController@index"); //MOSTRAR TODOS LOS REGISTROS

Route::post("/marcas","App\Http\Controllers\MarcaController@store"); //CREAR UN REGISTRO

Route::put("/marcas/{id}","App\Http\Controllers\MarcaController@update"); //ACTUALIZA UN REGISTRO

Route::delete("/marcas/{id}","App\Http\Controllers\MarcaController@destroy"); //ELIMINA UN REGISTRO

//? RUTAS DE CATEGORIAS
Route::get("/categorias","App\Http\Controllers\CategoriaController@index"); //MOSTRAR TODOS LOS REGISTROS

Route::post("/categorias","App\Http\Controllers\CategoriaController@store"); //CREAR UN REGISTRO

Route::put("/categorias/{id}","App\Http\Controllers\CategoriaController@update"); //ACTUALIZA UN REGISTRO

Route::delete("/categorias/{id}","App\Http\Controllers\CategoriaController@destroy"); //ELIMINA UN REGISTRO

//? RUTAS DE PROVEEDORES
Route::get("/proveedores","App\Http\Controllers\ProveedorController@index"); //MOSTRAR TODOS LOS REGISTROS

Route::post("/proveedores","App\Http\Controllers\ProveedorController@store"); //CREAR UN REGISTRO

Route::put("/proveedores/{id}","App\Http\Controllers\ProveedorController@update"); //ACTUALIZA UN REGISTRO

Route::delete("/proveedores/{id}","App\Http\Controllers\ProveedorController@destroy"); //ELIMINA UN REGISTRO

//? RUTAS DE PRODUCTOS
Route::get("/productos","App\Http\Controllers\ProductoController@index"); //MOSTRAR TODOS LOS REGISTROS

Route::post("/productos","App\Http\Controllers\ProductoController@store"); //CREAR UN REGISTRO

Route::put("/productos/{id}","App\Http\Controllers\ProductoController@update"); //ACTUALIZA UN REGISTRO

Route::delete("/productos/{id}","App\Http\Controllers\ProductoController@destroy"); //ELIMINA UN REGISTRO