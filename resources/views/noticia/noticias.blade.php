@extends('layout.siteNoticias')
@section('titulo','Notícias')
@section('conteudo')
<div class="container" id="marginTopHome">
    @if ($noticia)
        @foreach ($noticia as $item)
            <div class="row">
                <div class="col-12 col-lg-4">
                    @csrf
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><p>{{ $item['titulo_noticia'] }}</p></h5>
                        <a href="{{route('pagina.noticia',$item['id'])}}" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
            Não há Notícias!
        </div>
    @endif
</div>
@endsection