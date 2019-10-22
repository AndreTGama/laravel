@extends('layout.siteNoticias')
@section('titulo','Nova Notícias')
@section('conteudo')
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger" id="alertDanger" role="alert">
            {{$errors->first()}}
        </div>
    @endif
    @include('noticia.includes._formNoticia')
</div>
@endsection