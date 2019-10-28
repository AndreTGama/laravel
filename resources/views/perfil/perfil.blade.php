@extends('layout.sitePrincipal')
@section('titulo','Perfil')
@section('conteudo')
<div class="container">
    <div class="homeTela" id="cardLogin">
        <form action="{{route('perfil.post',$id)}}" method="POST">
            @csrf
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="{{asset('img/user.png')}}" class="card-img-top" alt="Imagem do Perfil">
                    <input class="form-group" name="lblNome" value="{{$nome}}"/>
                    <input class="form-group" name="lblEmail" value="{{$email}}"/>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
