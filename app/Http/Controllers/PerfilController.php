<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    /**
     * mudarSenha
     *
     * @param  mixed $id
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function indexMudarSenha($id,Response $res, Request $req){
        return view('perfil.mudar-senha', ['id' => $id]);
    }
    /**
     * mudarSenha
     *
     * @param  mixed $id
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function mudarSenha($id,Response $res, Request $req){
        $antigaSenha = $req->lblAntigaSenha;
        $senha1 = $req->lblSenha1;
        $senha2 = $req->lblSenha2;

        if(!empty($antigaSenha) && !empty($senha1) && !empty($senha2)){
            $user = User::where('id', '=', $id)->first();
            if($user){
                $hashedPassword = $user->senha;
                if (Hash::check($antigaSenha, $hashedPassword)){
                    if(Hash::check($senha1, $hashedPassword)){
                        return response()->json(['message' => 'Senha Nova não pode ser Igual a senha Antiga']); 
                    }else{
                        if($senha1 == $senha2){
                            DB::table('users')->where('id', $id)->update(['senha' => Hash::make($senha1)]);
                            return response()->json(['message' => 'Senha Alterada']); 
                        }else{
                            return response()->json(['message' => 'Senha não Confere']); 
                        }
                    }
                }else{
                    return response()->json(['message' => 'Senha Antiga está Errada']); 
                }
            }
        }
    }
}
