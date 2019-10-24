<?php

use Illuminate\Http\Request;

Route::get('/noticias', ['as' => 'noticias', 'uses' => 'NoticiasController@index']);
Route::get('/nova-noticia', ['as' => 'noticias.nova', 'uses' => 'NoticiasController@indexNovaNoticia']);
Route::post('/nova/noticia', ['as' => 'noticias.nova.post', 'uses' => 'NoticiasController@criarNoticia']);
Route::get('/nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'NoticiasController@paginaNoticia']);