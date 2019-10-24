<?php

use Illuminate\Http\Request;
Route::group(['prefix' => 'noticias'],function (){
    Route::get('todas', ['as' => 'todas.noticias','uses' => 'NoticiasController@index']);
    Route::get('nova-noticia', ['as' => 'noticia.nova', 'uses' => 'NoticiasController@indexNovaNoticia']);
    Route::post('nova/noticia', ['as' => 'noticia.nova.post', 'uses' => 'NoticiasController@criarNoticia']);
    Route::get('nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'NoticiasController@paginaNoticia']);
});