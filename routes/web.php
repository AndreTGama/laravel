<?php

// CRUD com Api do GitHub (básico)
Route::get('/', ['as' => 'home','uses' => 'ContatosGit@home']);
Route::get('/contato/novouser',['as' => 'contatos.novoUser.get','uses' => 'ContatosGit@adicionar']);
Route::post('/contato/novouser', ['as' => 'contatos.novoUser.post','uses' => 'ContatosGit@createUsuario']);
Route::get('/contato', ['as' => 'contatos.get','uses' => 'ContatosGit@getUsuarios']);
Route::get('/contato/update/{id}', ['as' => 'contatos.update.get', 'uses' => 'ContatosGit@updateBioUsuario']);
Route::post('/contato/update/{id}', ['as' => 'contatos.atualizar', 'uses' => 'ContatosGit@atualizar']);
Route::get('/contato/delete/{id}', ['as' => 'contatos.delete', 'uses' => 'ContatosGit@deleteUsuario']);

Route::group(['prefix' => 'noticias'], function(){
    Route::get('', ['as' => 'noticias', 'uses' => 'NoticiasController@index']);
    Route::get('/nova-noticia', ['as' => 'noticias.nova', 'uses' => 'NoticiasController@novaNoticia']);
    Route::get('/nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'NoticiasController@paginaNoticia']);
});