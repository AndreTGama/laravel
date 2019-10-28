<?php

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::get('/cadastro', ['as' => 'cadastro', 'uses' => 'LoginController@cadastro']);
Route::get('/home', ['as' => 'home','uses' => 'LoginController@home']);

Route::group(['middleware' => ['auth', 'auth.unique.user']], function(){
    Route::get('/home', ['as' => 'home','uses' => 'LoginController@home']);
    Route::get('/noticias', ['as' => 'noticias', 'uses' => 'NoticiasController@index']);
    Route::get('/nova-noticia', ['as' => 'noticias.nova', 'uses' => 'NoticiasController@novaNoticia']);
    Route::get('/nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'NoticiasController@paginaNoticia']);
    Route::get('/perfil', ['as' => 'perfil','uses' => 'PerfilController@index']);
    Route::post('/perfil', ['as' => 'perfil.post','uses' => 'PerfilController@atualizarPerfil']);
});