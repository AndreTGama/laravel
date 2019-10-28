@extends('layout.site')
@section('titulo','Login')
@section('conteudo')
    <div class="container">
        @if (session()->has('message'))
          <div class="alert alert-warning alert-dismissible">
              {{ session('message') }}
          </div>
         @endif
        <div class="card" id="cardLogin">
          <div id="cardLoginBody">
            <form action="{{route('login.post')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="lblEmail" id="lblEmail" aria-describedby="emailHelp" placeholder="E-mail" required>
                <small class="form-text text-muted">Nunca compartilharemos seu email com mais ninguém.</small>
              </div>
              <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="lblSenha" id="lblSenha" placeholder="Senha" required>
              </div>
              <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
          </div>
        </div>
    </div>
@endsection