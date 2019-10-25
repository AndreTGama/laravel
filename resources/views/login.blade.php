@extends('layout.siteHome')
@section('titulo','Home')
@section('conteudo')
    <div class="container">
        <div class="card" id="cardLogin">
          <div id="cardLoginBody">
              <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                    <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com mais ninguém.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
        </div>
    </div>
@endsection