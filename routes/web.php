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

//Route::get('/', 'CategoriaController@indexPublic');
Route::get('/', 'PublicController@indexPublic');
Route::get('/categoria/{categoria}', 'PublicController@getAnimals');
Route::get('/categoria/{categoria}/{animal}', 'PublicController@getAnimal');
//Route::get('/{categoria}/{animal}', 'PublicController@getAnimal');
Auth::routes();
Route::get('administra', 'CategoriaController@index')->middleware('auth');
Route::resource('administra/categoria', 'CategoriaController')->middleware('auth');
Route::resource('administra/animal', 'AnimalController')->middleware('auth');
Route::resource('administra/animal/seccions', 'SeccioController')->middleware('auth');

//Route::resource('administra/categoria', 'PostController')->middleware('auth');
//Route::resource('administra/animal', 'PostController')->middleware('auth');
//Route::get('/', 'PostController@getList');
//Route::resource('post', 'PostController')->middleware('auth');
