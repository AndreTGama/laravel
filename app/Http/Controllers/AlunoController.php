<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function index(){
        $user = Auth::user()->nome;
        return view('aluno.home', ['nome' => $user]);
    }
}
