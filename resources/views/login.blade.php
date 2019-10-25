@extends('layout.site')
@section('titulo','Login')
@section('conteudo')
    <div class="container">
        <div class="card" id="cardLogin">
          <div id="cardLoginBody">
            <form action="{{route('login.post')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com mais ninguém.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
              </div>
              <button type="submit" class="btn btn-primary">Entrar</button>
              <small class="form-text text-muted" id="cadastr" class="form-text text-muted">Caso não tem uma conta cick <a href="{{route('cadastro')}}">AQUI</a></small>
            </form>
          </div>
        </div>
    </div>
@endsection