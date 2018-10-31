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

Route::get('/politica', function () {
    return view('public/politicaPrivacitat/politicaPrivacitat');
});
Route::get('/', 'PublicController@indexPublic');
Route::get('familia/{familia}', 'PublicController@getAnimals');
Route::get('familia/{familia}/{especie}', 'PublicController@getAnimal');
Route::get('apadrina/{apadrina}', 'PublicController@getApadrina');
//Route::get('/{familia}/{especie}', 'PublicController@getAnimal');
Route::group(['prefix' => 'administra'], function () {

    Auth::routes();

});
Route::get('administra', 'AdministraController@index')->middleware('auth');
Route::resource('administra/familia', 'CategoriaController')->middleware('auth');
Route::resource('administra/especie', 'AnimalController')->middleware('auth');
Route::resource('administra/especie/seccions', 'SeccioController')->middleware('auth');
//Route::resource('administra/quisom', 'QuisomController')->middleware('auth');
Route::resource('administra/colaboradors', 'ColaboradorsController')->middleware('auth');
Route::resource('administra/contacta', 'ContactaController')->middleware('auth');
Route::resource('administra/apadrina', 'ApadrinaController')->middleware('auth');
Route::resource('administra/administra', 'AdministraController')->middleware('auth');
Route::post('mail/contact_me', 'EmailController@emailSend');
//Route::resource('administra/familia', 'PostController')->middleware('auth');
//Route::resource('administra/especie', 'PostController')->middleware('auth');
//Route::get('/', 'PostController@getList');
//Route::resource('post', 'PostController')->middleware('auth');
