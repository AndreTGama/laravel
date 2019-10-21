@extends('layout.site')
@section('titulo','Lista de Usuários')
@section('conteudo')
    <div class="container" id="marginTopHome">
        @if ($itens > 0)
            @foreach ($itens as $item)
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $item['avatar'] }}" class="card-img-top" alt="{{$item['nome']}}">
                        <div class="card-body">
                            <h5 class="card-title"><p>{{ $item['nome'] }}</p></h5>
                            <p class="card-text">{{ $item['bio'] }}</p>
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-primary">Deletar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-danger" role="alert">
                Não há dados no Banco de Dados!
            </div>
        @endif
    </div>
@endsection    