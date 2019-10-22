<form method="POST" action="" class="formMarginTop">
    <div class="form-group">
        <label for="formGroupExampleInput">Titulo Nóticia</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Input exemplo">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Notícia</label>
        <textarea class="form-control" id="validationTextarea" placeholder="Notícia"></textarea>
    </div>
    <div id="inputFileDiv">
        <div class="custom-file">
            <label>Descrição Arquivo</label>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <input type="text" class="form-control" name="descriçãoArquivo" placeholder="Descrição do Arquivo">
                </div>
                <div class="col-12 col-lg-6">
                    <input type="file" name="arquivo" class="custom-file-input" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo...</label>
                </div>
            </div>
        </div>
    </div>
    <div id="container"></div>
    <div class="form-group" id="moreInput">
        <a href="#container" class="btn btn-primary" id="somebutton">+</a>    
    </div>
</form>