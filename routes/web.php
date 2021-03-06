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

//User's Routes
Route::get("/", "UsuarioController@index");
Route::get("/form", "UsuarioController@create")->middleware('checarhorario');
Route::post("/", "UsuarioController@store");
Route::get("/{id}/edit", "UsuarioController@edit");
Route::put("/{id}", "UsuarioController@update");
Route::delete("/{id}", "UsuarioController@destroy");
Route::put("/restore/{id}", "UsuarioController@restore");

// Nivel's Routes
Route::get("/nivel", "NivelController@index");
Route::get("/nivel/form", "NivelController@create");
Route::post("/nivel", "NivelController@store");
Route::get("/nivel/{id}/edit", "NivelController@edit");
Route::put("/nivel/{id}", "NivelController@update");



// Route::get("/soma/{a}/{b}", "UsuarioController@soma");

//POST: used to send data

//PUT: to update data

//DELETE: to delete data 

