<?php

namespace App\Http\Controllers;

use App\TipoUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;

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
    public function login(Response $res, Request $req){
        
        $email = $req->lblEmail;
        $senha = $req->lblSenha;
        if(!empty($email) && !empty($senha)){
            $user = User::where('email', '=', $email)->first();
            if($user){
                $hashedPassword = $user->senha;
                if (Hash::check($senha, $hashedPassword)) {
                    Auth::login($user);
                    $tipoUserId = $user->tipo_user_id;
                    $tipoUser = TipoUser::where('id', '=', $tipoUserId)->first();
                    $nomeTipoUser = $tipoUser['tipo_user'];
                    return redirect()->route($nomeTipoUser.'.home');
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
        $tipoUser = TipoUser::all();
        return view('cadastro', ['tipouser' => $tipoUser]);
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
        $tipoUser = $req->lblTipoUser;

        if(!empty($senha1) && !empty($senha2) && !empty($email) && !empty($nome)  && !empty($tipoUser)){
            if($senha1 == $senha2){
                $user = DB::table('users')->where('email','=', $email)->first();
                if(isset($user)){
                    return response()->json(['message' => 'E-mail já está em uso']); 
                }else{
                    $dados = [
                        'nome' => $nome, 
                        'email' => $email, 
                        'senha' => Hash::make($senha1),
                        'tipo_user_id' => $tipoUser
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
    public function esqueceuSenha(Request $req){
        $email = $req->lblEmail;
        if(!empty($email)){
            $user = DB::table('users')->where('email','=', $email)->first();
            if(!empty($user)){
                $details = [
                    'title' => 'Mail from ItSolutionStuff.com',
                    'body' => 'This is for testing email using smtp'
                ];
                Mail::to($user->email)->send(new \App\Mail\MyTestMail($details));
                return response()->json(['message' => 'E-mail Enviado']); 
            }else{
                return response()->json(['message' => 'E-mail não existe no sistema']); 
            }
        }else{
            return response()->json(['message' => 'Campos Vazios']); 
        }
        
    }
    public function formEsqueceuSenha(){
        return view('form-esqueceu-senha');
    }
}
