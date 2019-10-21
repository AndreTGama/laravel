<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatosGit extends Controller
{   
    public function home(){
        return view('home');
    }
    /**
     * getUsuarios
     *
     * @return void
     */
    public function getUsuarios(){
        $userGitHubs = Contato::all();
        return view('/contato/contato')->with('itens', json_decode($userGitHubs, true));;
    }
    /**
     * adicionar
     *
     * @return void
     */
    public function adicionar(){
        return view('/contato/novoUser');
    }
    /**
     * createUsuario
     *
     * @return void
     */
    public function createUsuario(Request $req){
        // Pegando informações do model e usando a biblioteca Guzzlehttp
        // $usuario = new Usuario();
        // $nome = $usuario->lista()->nome;
        // $client = new \GuzzleHttp\Client();
        // $url = 'https://api.github.com/users/'.$nome.'';
        // $res = $client->get($url);
        // $userGitHubs = (string) $res->getBody();
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
            return redirect()->route('contatos.get');
        }else{
            return redirect()->route('home');
        }
        
    }
    /**
     * updateBioUsuario
     *
     * @return void
     */
    public function updateBioUsuario($id){
        $contato = Contato::find($id);
        return view('/contato/updateUser')->with('item', json_decode($contato, true));
    }
    /**
     * deleteUsuario
     *
     * @return void
     */
    public function deleteUsuario(){
        
    }
}
