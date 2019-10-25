<?php

Route::group(['prefix' => 'noticias'],function (){
    Route::get('todas', ['as' => 'todas.noticias','uses' => 'APINoticiasController@index']);
    Route::get('tipo-noticias', ['as' => 'todas.noticias','uses' => 'APINoticiasController@tipoNoticia']);
    Route::post('nova/noticia', ['as' => 'noticia.nova.post', 'uses' => 'APINoticiasController@criarNoticia']);
    Route::get('nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'APINoticiasController@paginaNoticia']);
});