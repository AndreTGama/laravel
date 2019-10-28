<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class PerfilController extends Controller
{
    /**
     * index
     *
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function index(Response $res, Request $req){
        $nome = Auth::user()->nome;
        $email = Auth::user()->email;
        return view('perfil.perfil', ['nome' => $nome, 'email' => $email]);
    }
    /**
     * atualizaPerfil
     *
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function atualizaPerfil(Response $res, Request $req){

    }
}
