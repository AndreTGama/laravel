<?php

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
Route::get('/esqueceu-senha', ['as' => 'esqueceu.senha', 'uses' => 'LoginController@indexEsqueceuSenha']);
Route::post('/esqueceu-senha', ['as' => 'esqueceu.senha.post', 'uses' => 'LoginController@esqueceuSenha']);
Route::get('/formulario-esqueceu-senha', ['as' => 'form.esqueceu.senha', 'uses' => 'LoginController@formEsqueceuSenha']);



Route::get('/cadastro', ['as' => 'cadastro', 'uses' => 'LoginController@cadastro']);
Route::get('/home', ['as' => 'home','uses' => 'LoginController@home']);

Route::group(['middleware' => ['auth', 'auth.unique.user']], function(){
    Route::get('/home', ['as' => 'home','uses' => 'LoginController@home']);
    Route::get('/noticias', ['as' => 'noticias', 'uses' => 'NoticiasController@index']);
    Route::get('/nova-noticia', ['as' => 'noticias.nova', 'uses' => 'NoticiasController@novaNoticia']);
    Route::get('/nova/noticia={id}', ['as' => 'pagina.noticia', 'uses' => 'NoticiasController@paginaNoticia']);
    Route::get('/perfil', ['as' => 'perfil','uses' => 'PerfilController@index']);
    Route::post('/perfil/{id}', ['as' => 'perfil.post','uses' => 'PerfilController@atualizaPerfil']);
    Route::get('/perfil/mudar-senha/{id}', ['as' => 'mudar.senha','uses' => 'PerfilController@indexMudarSenha']);
    Route::post('/perfil/mudar-senha/{id}', ['as' => 'mudar.senha.post','uses' => 'PerfilController@mudarSenha']);
});