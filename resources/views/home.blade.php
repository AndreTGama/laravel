@extends('layout.siteHome')
@section('titulo','Home')
@section('conteudo')
    <div class="container" id="marginTopHome">
        <div class="card lgoGitHub">
            <a href="{{route('contatos.get')}}">
                <div>
                    <img src="{{asset('img/github.png')}}" name="logo" id="lgoGit">
                </div>
            </a>
        </div>
        <br>
        <div class="card lgoGitHub" type="button">
            <a href="{{route('noticias')}}">
                <div>
                    <img src="{{asset('img/ultimasnoticias2.png')}}" name="logo" id="lgoGit">
                </div>
            </a>
        </div>
    </div>
@endsection