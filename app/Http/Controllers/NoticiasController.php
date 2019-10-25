<?php

namespace App\Http\Controllers;

use App\arquivo;
use App\noticia;
use App\tipo_noticia;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticiasController extends Controller
{
    /**
     * index
     *
     * @param  mixed $res
     *
     * @return void
     */
    public function index(Response $res){
        return view('noticia/noticias');
    }
    /**
     * paginaNoticia
     *
     * @param  mixed $res
     * @param  mixed $id
     *
     * @return void
     */
    public function paginaNoticia(Response $res, $id){
        return view('noticia/noticia');
    }
    /**
     * indexNovaNoticia
     *
     * @param  mixed $res
     *
     * @return void
     */
    public function indexNovaNoticia(Response $res){
        return view('noticia/criarNoticia');
    }
    /**
     * criarNoticia
     *
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function novaNoticia(Response $res, Request $req){
        return view('noticia/criarNoticia');
    }
}