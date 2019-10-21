<?php

Route::get('/', function(){
    return view('home');
});
Route::post('/contato', ['uses' => 'ControllerHome@home']);