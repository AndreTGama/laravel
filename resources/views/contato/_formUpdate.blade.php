<form action="{{route('contatos.atualizar', $item['id'])}}" method="POST">
    @csrf
    <div id="centerCardUpdate" class="card" style="width: 18rem;">
        <div id="cardMarginItem">
            <div class="form-group">
                    <img src="{{ $item['avatar'] }}" class="card-img-top" alt="{{$item['nome']}}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="avatar" value="{{ $item['avatar'] }}" class="form-control-file" id="exampleFormControlFile1">
                </div>    
                <div class="form-group">
                    <h5 class="card-title"><input value="{{$item['nome'] }}" type="text" class="form-control" name="nome"></h5>
                </div>
                <div class="form-group">
                    <p class="card-text"><input value="{{ $item['bio'] }}" class="form-control" name="bio"/></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
        </div>
    </div>
</form>
<br>
    