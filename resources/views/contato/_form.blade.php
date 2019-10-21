    <div class="inputUser">
        <label for="exampleInputEmail1">Nome no GitHub</label><br>
        <input type="text" name="nomeUserGit" id="inputUser" value="{{isset($contato->nomeUserGit) ? $contato->nomeUserGit : ''}}">
    </div>
    <div class="buttonHome" style="margin:2%">
        <button class="btn btn-primary">Cadastrar Usuário</button>
    </div>
