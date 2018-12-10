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
Route::get('/idioma/{llengua}', array('as'=>'set-locale', 'uses'=>'LanguageController@setLocale'));

Route::get('/politica', function () {
    return view('public/politicaPrivacitat/politicaPrivacitat');
});
Route::get('/', 'PublicController@indexPublic');
Route::get('familia/{familia}', 'PublicController@getAnimals');
Route::get('familia/{familia}/{especie}', 'PublicController@getAnimal');
Route::get('apadrina/{apadrina}', 'PublicController@getApadrina');
Route::get('apadrina/compra/{id}', 'PublicController@getCarret');
/**

* Redsys

*/
Route::post('apadrina/compra/plataform/redsys', ['as' => 'redsys', 'uses' => 'PlataformaPagamentController@comprar']);

/**

* Comprobar redsys

*/

Route::post('apadrina/compra/plataform/redsys/notification','RedsysController@comprobar');
Route::get('apadrina/compra/plataform/redsys/notification','RedsysController@comprobar');


Route::group(['prefix' => 'administra'], function () {

    Auth::routes();

});
Route::get('administra', 'AdministraController@index')->middleware('auth');
Route::resource('administra/familia', 'CategoriaController')->middleware('auth');
Route::resource('administra/especie', 'AnimalController')->middleware('auth');
Route::resource('administra/especie/seccions', 'SeccioController')->middleware('auth');
Route::resource('administra/colaboradors', 'ColaboradorsController')->middleware('auth');
Route::resource('administra/contacta', 'ContactaController')->middleware('auth');
Route::resource('administra/apadrina', 'ApadrinaController')->middleware('auth');
Route::resource('administra/administra', 'AdministraController')->middleware('auth');
Route::resource('administra/plataformaPagament', 'PlataformaPagamentController')->middleware('auth');

Route::resource('ES/administra/familia', 'CategoriaControllerES')->middleware('auth');
Route::resource('ES/administra/especie', 'AnimalControllerES')->middleware('auth');
Route::resource('ES/administra/especie/seccions', 'SeccioControllerES')->middleware('auth');
Route::resource('ES/administra/contacta', 'ContactaControllerES')->middleware('auth');
Route::resource('ES/administra/apadrina', 'ApadrinaControllerES')->middleware('auth');
Route::resource('ES/administra/administra', 'AdministraControllerES')->middleware('auth');
Route::resource('ES/administra/plataformaPagament', 'PlataformaPagamentControllerES')->middleware('auth');


Route::resource('EN/administra/familia', 'CategoriaControllerEN')->middleware('auth');
Route::resource('EN/administra/especie', 'AnimalControllerEN')->middleware('auth');
Route::resource('EN/administra/especie/seccions', 'SeccioControllerEN')->middleware('auth');
Route::resource('EN/administra/contacta', 'ContactaControllerEN')->middleware('auth');
Route::resource('EN/administra/apadrina', 'ApadrinaControllerEN')->middleware('auth');
Route::resource('EN/administra/administra', 'AdministraControllerEN')->middleware('auth');
Route::resource('EN/administra/plataformaPagament', 'PlataformaPagamentControllerEN')->middleware('auth');

Route::post('mail/contact_me', 'EmailController@emailSend');
