<div class="card" style="width: 18rem;">
    <img src="{{ $item['avatar'] }}" class="card-img-top" alt="{{$item['nome']}}">
    <div class="card-body">
        <h5 class="card-title"><p>{{ $item['nome'] }}</p></h5>
        <p class="card-text">{{ $item['bio'] }}</p>
        <a href="#" class="btn btn-primary">Editar</a>
        <a href="#" class="btn btn-primary">Deletar</a>
    </div>
</div>