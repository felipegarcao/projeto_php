<?php if($Sessao::retornaErro()){ ?>
    <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
    </div>
<?php } ?>  
<div class="loginContainer" style="flex-direction: column; margin-top: 2rem; height: calc(100vh - 230px)">
    <h2>Cadastro de Categoria</h2>
    <div class="containerCadastroPost" style="padding: 2rem">
        <form action="http://<?php echo APP_HOST; ?>/category/salvar" method="post" id="form_cadastro">
            <label>
                <span>
                    Nome da Categoria
                </span>
                <input type="text" placeholder="Digite o nome da Categoria" id="nome" name="nome" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>"/>
            </label>
            <button type="submit" class="buttonSubmit">Cadastrar</button>
        </form>
    </div>
</div>