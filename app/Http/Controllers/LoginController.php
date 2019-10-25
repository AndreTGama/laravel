<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
     * home
     *
     * @return void
     */
    public function home(){
        return view('home');

    }
    /**
     * confirmarLogin
     *
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function login(Response $res, Request $req){
        $email = $req->email;
        $senha = $req->senha;

        if(Auth::attempt(['email' => $email, 'senha' => $senha])){
            return view('home');
        }else{
            return view('login');
        }
    }
    /**
     * logout
     *
     * @return void
     */
    public function logout(){
        Auth::logout();
        return view('login');
    }
    /**
     * indexCriarConta
     *
     * @return void
     */
    public function cadastro(){
        return view('cadastro');
    }
    /**
     * criarConta
     *
     * @param  mixed $req
     *
     * @return void
     */
    public function cadastrarUser(Request $req){
        if($req->lblSenha == $req->lblSenha2){
            $user = DB::table('users')->where('email',$req->lblEmail)->first();
            if(isset($user)){
                return response()->json(['message' => 'E-mail já está em uso']); 
            }else{
                $dados = [
                    'nome' => $req->lblNome, 
                    'email' => $req->lblEmail, 
                    'senha' => Hash::make($req->lblSenha)
                ];
                User::create($dados);
                return response()->json(['message' => 'Conta Criada com Sucesso!!!']); 
            }
        }else{
            return response()->json(['message' => 'Senhas estão diferentes']); 
        }        

        // $client = new \GuzzleHttp\Client();
        // $url = 'https://api.github.com/users/'.$nome['nomeUserGit'].'';
        // $res = $client->get($url);
        // $userGitHubs = (string)$res->getBody();
        // $user = json_decode($userGitHubs, true);
        // $name = $user['name'];
        // $bio = $user['bio'];
        // $avatar = $user['avatar_url'];
        // $arrayUser = ['nome'=>$name,'bio'=>$bio,'avatar'=>$avatar];
    }
}
