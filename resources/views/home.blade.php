@extends('layout.site')
@section('titulo','Home')
@section('conteudo')
    <div class="container" id="marginTopHome">
        <div class="lgoGitHub">
            <img src="{{asset('img/github.png')}}" name="logo" id="lgoGit">
        </div>
        <form method="POST" action="/contato">
            @csrf
            <div class="inputUser">
                <input type="text" name="nomeUserGit" id="inputUser">
            </div>
            <div class="buttonHome">
                <button class="btn-primary">Cadastrar Usuário</button>
            </div>
        </form>
    </div>
@endsection