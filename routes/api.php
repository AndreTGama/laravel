<?php

use Illuminate\Http\Request;
Route::group(['prefix' => 'noticias'],function (){
    Route::get('todas', ['as' => 'todas.noticias','uses' => 'APINoticiasController@index']);
    Route::get('nova-noticia', ['as' => 'noticia.nova', 'uses' => 'APINoticiasController@indexNovaNoticia']);
    Route::post('nova/noticia', ['as' => 'noticia.nova.post', 'uses' => 'APINoticiasController@criarNoticia']);
    Route::get('nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'APINoticiasController@paginaNoticia']);
});