<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatosGit extends Controller
{   
    /**
     * getUsuarios
     *
     * @return void
     */
    public function getUsuarios(){
        return view('/contato/contato');
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

        return view('/contato/contato');
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
