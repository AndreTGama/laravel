@extends('layout.sitePrincipal')
@section('titulo','Perfil')
@section('conteudo')
    <div class="container">
        <div class="card" id="cardLogin">
          <div id="cardLoginBody">
            <form action="{{route('mudar.senha.post',$id)}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="lblAntigaSenha">Senha Antiga</label>
                <input type="password" class="form-control" name="lblAntigaSenha" id="lblAntigaSenha" placeholder="Senha Antiga" required>
              </div>
              <div class="form-group">
                <label for="lblSenha1">Senha</label>
                <input type="password" class="form-control" name="lblSenha1" id="lblSenha1" placeholder="Senha" required>
              </div>
              <div class="form-group">
                <label for="lblSenha2">Confirmar Senha</label>
                <input type="password" class="form-control" name="lblSenha2" id="lblSenha2" placeholder="Confirmar Senha" required>
              </div>
              <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
          </div>
        </div>
    </div>
@endsection