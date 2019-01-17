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

Route::get('/', 'PagesController@home');

Route::get('/messages/{message}', 'MessageController@show');

/**
 * Esta ruta se encuentra protegida
 * Solo pueden acceder aquellos usuarios que estén actualmente autenticados
 * en el sistema
 */
Route::post('/messages/create', 'MessageController@create')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Esto no es un route model binding
 * sino que el username es un texto simple que pasaremos al controlador
 * Lo agrego en esta zona debido a que por orden entra en conflicto con la ruta
 * de autenticación y registros
 */
Route::get('{username}', 'UserController@show');

//Ruta para saber a quien sigue este usuario
Route::get('{username}/follows', 'UserController@follows');
//Ruta para saber quienes siguen a este usuario
Route::get('{username}/followed', 'UserController@followed');

//Para registrar a quien quiero seguir
Route::post('/{username}/follow', 'UserController@follow');
//Para registrar a quien quiero dejar de seguir
Route::post('/{username}/unfollow', 'UserController@unfollow');