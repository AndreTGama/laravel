<?php

// CRUD com Api do GitHub (básico)
Route::get('/home', ['as' => 'home','uses' => 'ContatosGit@home']);

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::group(['prefix' => 'noticias'], function(){
    Route::get('', ['as' => 'noticias', 'uses' => 'NoticiasController@index']);
    Route::get('/nova-noticia', ['as' => 'noticias.nova', 'uses' => 'NoticiasController@novaNoticia']);
    Route::get('/nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'NoticiasController@paginaNoticia']);
});