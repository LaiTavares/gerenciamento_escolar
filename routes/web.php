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

//GET: used to return data

Route::get("/", "UsuarioController@index");
// Route::get("/soma/{a}/{b}", "UsuarioController@soma");
Route::get("/form", "UsuarioController@create");
Route::post("/", "UsuarioController@store");

//POST: used to send data

//PUT: to update data

//DELETE: to delete data 

