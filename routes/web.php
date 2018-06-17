<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('cuenta', ['as' => 'cuenta', 'uses' => 'PagesController@cuenta']);
Route::get('base_legal', ['as' => 'base_legal', 'uses' => 'PagesController@base_legal']);
Route::get('recomendar-rutas', ['as' => 'recomendar-rutas', 'uses' => 'PagesController@recomendarRutas']);
Route::get('contacto', ['as' => 'contacto', 'uses' => 'PagesController@contacto']);
Route::get('rutas_usuario/{id}', ['as' => 'rutas_usuario', 'uses' => 'ControladorRutas@rutas_usuario']);
Route::get('mensajes/ruta/{id}/crear', ['as' => 'mensajes.ruta.crear', 'uses' => 'ControladorMensajesRutas@crear']);
Route::get('mensajes/punto/{id}/crear', ['as' => 'mensajes.punto.crear', 'uses' => 'ControladorMensajesPuntos@crear']);
Route::get('rutas/ordenadas/{id}', ['as' => 'rutas.ordenadas', 'uses' => 'ControladorRutas@ordenadas']);

Route::resource('mensajes_rutas', 'ControladorMensajesRutas');
Route::resource('mensajes_puntos', 'ControladorMensajesPuntos');
Route::resource('usuarios', 'ControladorUsuarios');
Route::resource('rutas', 'ControladorRutas');
Route::resource('puntos', 'ControladorPuntos');
Route::resource('tematicas', 'ControladorTematicas');
Route::resource('ciudades', 'ControladorCiudades');
Route::resource('comunidades', 'ControladorComunidades');

Route::post('rutas-ciudad', ['as' => 'rutas-ciudad', 'uses' => 'PagesController@verRutas']);

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login'); // Si se intenta acceder a un recurso no permitido por el controlador o el middleware, redirecciona al login.
Route::get('logout', 'Auth\LoginController@logout');
// Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']); // Si se intenta acceder a un recurso no permitido por el controlador o el middleware, redirecciona al login.

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
