<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;

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
        $id = Auth::user()->id;
        return view('perfil.perfil', ['nome' => $nome, 'email' => $email,'id' => $id]);
    }
    /**
     * atualizaPerfil
     *
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function atualizaPerfil($id,Response $res, Request $req){
        $nome = $req->lblNome;
        $email = $req->lblEmail;

        if(!empty($nome) && !empty($email)){
            if($nome){
                DB::table('users')
                ->where('id', $id)
                ->update(['nome' => $nome]);
            }
            if($email){
                DB::table('users')
                ->where('id', $id)
                ->update(['email' => $email]);
            }
            return response()->json(['message' => 'Dados Atualizados']); 

        }else{
            return response()->json(['message' => 'Campos Vazios']); 
        }
    }
}
