@extends('layout.site')
@section('titulo','Lista de Usuários')
@section('conteudo')
    <div class="container" id="marginTopHome">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="{{ $userGitHubs['avatar_url'] }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><p>{{ $userGitHubs['login'] }}</p></h5>
                        <p class="card-text">{{ $userGitHubs['bio'] }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection    