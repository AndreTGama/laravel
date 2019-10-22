<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index(){
        return view('noticia/noticias');
    }
    public function indexNovaNoticia(){
        return view('noticia/criarNoticia');
    }
}
