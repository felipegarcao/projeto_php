<?php if ($Sessao::retornaErro()) { ?>
    <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
            echo $mensagem . "<br />";
        } ?>
    </div>
<?php } ?>
<div class="loginContainer" style="flex-direction: column; margin-top: 2rem; height: calc(100vh - 230px)">
    <h2>Excluir categoria</h2>
    <div class="containerCadastroPost" style="padding: 2rem">

        <form action="http://<?php echo APP_HOST; ?>/category/excluir/<?= $viewVar['category']->getIdCategory() ?>" method="post" id="form_cadastro">
            <input type="hidden" class="form-control" name="idCategory" id="idCategory" value="<?php echo $viewVar['category']->getIdCategory(); ?>">
            <label>
                <span>
                    Nome da Categoria
                </span>
                <input type="text" class="form-control" name="name" id="nome" value="<?php echo $viewVar['category']->getName(); ?>" readonly>
            </label>

            <div class="d-flex gap-3 justify-content-center">
            <a href="http://<?php echo APP_HOST; ?>/category" class="buttonCancel">Cancelar</a>
                <button type="submit" class="buttonSubmit">Confirmar</button>
            </div>
        </form>

    </div>
</div>