<?php

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::controllers([
	'auth'		=> 'Auth\AuthController',
	'password'	=> 'Auth\PasswordController'
]);

Route::post('cadastro', 'UsuarioController@store');

Route::group(['middleware' => 'auth'], function() {

    Route::get('google_rss', 'HomeController@googlerss');
    Route::resource('usuarios', 'UsuarioController');
	         
});
