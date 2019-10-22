@extends('layout.siteNoticias')
@section('titulo','Nova Notícias')
@section('conteudo')
<div class="container">
    @include('noticia.includes._formNoticia')
</div>
@endsection