@extends('layout.site')
@section('titulo','Novo Usuário')
@section('conteudo')
    <div class="container" id="marginTopHome">
        <div class="card">
            <div class="lgoGitHub">
                <img src="{{asset('img/github.png')}}" name="logo" id="lgoGit">
            </div>
            <form method="POST" action="{{route('contatos.novoUser.post')}}">
                @csrf
                @include('contato._form')
            </form>
        </div>
    </div>
@endsection