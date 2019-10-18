@extends('layout.site')
@section('titulo','Home')
@section('conteudo')
    <div class="container" id="marginTopHome">
       <div class="card">
            <p>{{ $userGitHubs['login'] }}</p>
            <img {{ $userGitHubs['avatar_url'] }}> 
       </div>
    </div>
@endsection    
