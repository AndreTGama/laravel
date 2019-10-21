<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class ControllerHome extends Controller
{
    /**
     * home
     *
     * @return void
     */
    public function home(Request $req){
        
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

        
        return view('/contato/contato')->with('userGitHubs', json_decode($userGitHubs, true));
    }
}
