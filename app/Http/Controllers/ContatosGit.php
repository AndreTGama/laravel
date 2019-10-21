<?php

namespace App\Http\Controllers;

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
        return view('/contato/contato');
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
    public function createUsuario(){
         // Pegando informações do model e usando a biblioteca Guzzlehttp
        // $usuario = new Usuario();
        // $nome = $usuario->lista()->nome;
        // $client = new \GuzzleHttp\Client();
        // $url = 'https://api.github.com/users/'.$nome.'';
        // $res = $client->get($url);
        // $userGitHubs = (string) $res->getBody();
        
        // $nome = $req['nomeUserGit'];
        // $client = new \GuzzleHttp\Client();
        // $url = 'https://api.github.com/users/'.$nome.'';
        // $res = $client->get($url);
        // $userGitHubs = (string) $res->getBody();

        // return view('/contato/contato')->with('userGitHubs', json_decode($userGitHubs, true));
    }
    /**
     * updateBioUsuario
     *
     * @return void
     */
    public function updateBioUsuario(){
        
    }
    /**
     * deleteUsuario
     *
     * @return void
     */
    public function deleteUsuario(){
        
    }
}
