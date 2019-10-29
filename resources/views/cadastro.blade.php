@extends('layout.site')
@section('titulo','Login')
@section('conteudo')
<div class="container">
  <div class="card" id="cardLogin">
    <div id="cardLoginBody">
      <form action="{{route('cadastro.post')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nome</label>
          <input type="text" class="form-control" name="lblNome" id="lblNome" aria-describedby="emailHelp" placeholder="Nome" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="lblEmail" name="lblEmail" aria-describedby="emailHelp" placeholder="E-mail" required>
          <small class="form-text text-muted">Nunca compartilharemos seu email com mais ninguém.</small>
        </div>
        <div class="form-group">
          <label for="lblTipoUser">Tipo de Usuário</label>
          <select id="lblTipoUser" class="form-control" name="lblTipoUser" required>
              <option value=''>Escolha o tipo de Usuário</option>
            @foreach ($tipouser as $item)
              <option value='{{ $item->id }}'>{{ $item->tipo_user }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="lblSenha" name="lblSenha" placeholder="Senha" required>
        </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Confirma Senha</label>
          <input type="password" class="form-control" id="lblSenha2" name="lblSenha2" placeholder="Senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
@endsection