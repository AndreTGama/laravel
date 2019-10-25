<?php

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::get('/cadastro', ['as' => 'cadastro', 'uses' => 'LoginController@cadastro']);
Route::get('/home', ['as' => 'home','uses' => 'LoginController@home']);

Route::group(['prefix' => 'noticias'], function(){
    Route::get('', ['as' => 'noticias', 'uses' => 'NoticiasController@index']);
    Route::get('/nova-noticia', ['as' => 'noticias.nova', 'uses' => 'NoticiasController@novaNoticia']);
    Route::get('/nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'NoticiasController@paginaNoticia']);
});