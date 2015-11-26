<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('dashboard', 'DashboardController@index');
Route::resource('usuarios', 'UsuariosController');
Route::get('padres/getBorrado', 'PadresController@getBorrado');
Route::resource('padres', 'PadresController');
Route::get('ninos/getBorrado', 'NinosController@getBorrado');
Route::resource('ninos', 'NinosController');
Route::get('comunidades/getBorrado', 'ComunidadesController@getBorrado');
Route::resource('comunidades', 'ComunidadesController');
Route::get('visitas/getBorrado', 'VisitasController@getBorrado');
Route::resource('visitas', 'VisitasController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
