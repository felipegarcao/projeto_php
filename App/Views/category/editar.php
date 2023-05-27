<div class="col-md-9">
    <?php if($Sessao::retornaErro()){ ?>
        <div class="alert alert-warning" role="alert">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
        </div>
    <?php } ?>  
    <div class="loginContainer" style="flex-direction: column; margin-top: 2rem; height: calc(100vh - 230px)">
        <h2>Alterar Categoria</h2>
        <div class="containerCadastroPost" style="padding: 2rem">
            <form action="http://<?php echo APP_HOST; ?>/category/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="idCategory" id="idCategory" value="<?php echo $viewVar['category']->getIdCategory(); ?>">
                <label>
                    <span>
                        Nome da Categoria
                    </span>
                    <input type="text" placeholder="Digite o nome da Categoria" name="name" id="name" value="<?php echo $viewVar['category']->getName(); ?>"/>
                </label>
                <button type="submit" class="buttonSubmit">Atualizar</button>
            </form>
        </div>
    </div>
</div>
