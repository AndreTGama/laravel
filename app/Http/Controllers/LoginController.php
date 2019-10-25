<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        return view('login');
    }
    /**
     * confirmarLogin
     *
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function confirmarLogin(Response $res, Request $req){
        $usuario = $req->usuario;
        $senha = $req->senha;

    }
    /**
     * indexCriarConta
     *
     * @return void
     */
    public function indexCriarConta(){
        return view('cadastro');
    }
    /**
     * criarConta
     *
     * @param  mixed $req
     *
     * @return void
     */
    public function ApiCriarConta(Request $req){
        $nome = $req->all();
        if(isset($nome['nomeUserGit'])){
            $client = new \GuzzleHttp\Client();
            $url = 'https://api.github.com/users/'.$nome['nomeUserGit'].'';
            $res = $client->get($url);
            $userGitHubs = (string)$res->getBody();
            $user = json_decode($userGitHubs, true);
            $name = $user['name'];
            $bio = $user['bio'];
            $avatar = $user['avatar_url'];
            $arrayUser = ['nome'=>$name,'bio'=>$bio,'avatar'=>$avatar];
            Contato::create($arrayUser);
            return response()->json(['message' => 'Conta Criada com Sucesso']);
        }else{
            return response()->json(['message' => 'Conta de Usuário Já existe']);
        }
    }
}
