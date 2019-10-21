@extends('layout.site')
@section('titulo','Home')
@section('conteudo')
    <div class="container" id="marginTopHome">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <p>{{ $userGitHubs['login'] }}</p>
                    <img {{ $userGitHubs['avatar_url'] }}> 
                </div>
            </div>
        </div>
    </div>
@endsection    