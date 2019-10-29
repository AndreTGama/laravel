<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        $user = Auth::user()->nome;
        return view('home', ['nome' => $user]);
    }
    /**
     * apiHome
     *
     * @return void
     */
    public function apiHome(){
        $user = Auth::user()->nome;
        return response()->json(['message' => 'Bem-Vindo '.$user]); 
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
        
        $email = $req->lblEmail;
        $senha = $req->lblSenha;
        if(!empty($email) && !empty($senha)){
            $user = User::where('email', '=', $email)->first();
            if($user){
                $hashedPassword = $user->senha;
                if (Hash::check($senha, $hashedPassword)) {
                    Auth::login($user);
                    return redirect('home'); 
                }else{
                    return response()->json(['message' => 'Senha Incorreta']); 
                }
            }else{
                return response()->json(['message' => 'E-mail Incorreto']); 
            }   
        }else{
            return response()->json(['message' => 'Campos Vazios']); 
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
        
        $senha1 = $req->lblSenha;
        $senha2 = $req->lblSenha2;
        $email = $req->lblEmail;
        $nome = $req->lblNome;
        
        if(!empty($senha1) && !empty($senha2) && !empty($email) && !empty($nome)){
            if($senha1 == $senha2){
                $user = DB::table('users')->where('email','=', $email)->first();
                if(isset($user)){
                    return response()->json(['message' => 'E-mail já está em uso']); 
                }else{
                    $dados = [
                        'nome' => $nome, 
                        'email' => $email, 
                        'senha' => Hash::make($senha1)
                    ];
                    User::create($dados);
                    return response()->json(['message' => 'Conta Criada com Sucesso!!!']); 
                }
            }else{
                return response()->json(['message' => 'Senhas estão diferentes']); 
            }  
        }else{
            return response()->json(['message' => 'Campos Vazios']); 
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
    /**
     * indexEsqueceuSenha
     *
     * @return void
     */
    public function indexEsqueceuSenha(){
        return view('esqueceu-senha');
    }
    public function esqueceuSenha(){
        
    }
}
