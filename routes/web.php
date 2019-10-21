<?php

Route::get('/', function(){
    return view('home');
});
Route::get('/contato', ['as' => 'contatos.get','uses' => 'ContatosGit@getUsuarios']);
Route::post('/contato', ['as' => 'contatos.post','uses' => 'ContatosGit@createUsuario']);
Route::put('/contato', ['as' => 'contatos.put', 'uses' => 'ContatosGit@updateBioUsuario']);
Route::delete('/contato', ['as' => 'contatos.delete', 'uses' => 'ContatosGit@deleteUsuario']);
