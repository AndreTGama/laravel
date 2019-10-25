<form method="POST" action="" enctype="multipart/form-data" class="formMarginTop">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Titulo Nóticia</label>
        <input type="text" name="titulo" class="form-control" id="formGroupExampleInput" placeholder="Titulo Notícia" required>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Notícia</label>
        <textarea class="form-control" name="noticia" id="validationTextarea" placeholder="Notícia"></textarea>
    </div>
    <div id="container">
    </div>
    <div class="form-group" id="moreInput">
        <a href="#container" class="btn btn-primary" id="somebutton">+</a>    
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
</form>