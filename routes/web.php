<?php

Route::get('/', ['as' => 'home','uses' => 'ContatosGit@home']);
Route::get('/contato/novouser',['as' => 'contatos.novoUser.get','uses' => 'ContatosGit@adicionar']);
Route::post('/contato/novouser', ['as' => 'contatos.novoUser.post','uses' => 'ContatosGit@createUsuario']);

Route::get('/contato', ['as' => 'contatos.get','uses' => 'ContatosGit@getUsuarios']);
Route::put('/contato', ['as' => 'contatos.put', 'uses' => 'ContatosGit@updateBioUsuario']);
Route::delete('/contato', ['as' => 'contatos.delete', 'uses' => 'ContatosGit@deleteUsuario']);
