<div class="container">
    <div class="col-md-9">
        <h1>Excluir categoria</h1>

        <?php if ($Sessao::retornaErro()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
                    echo $mensagem . "<br />";
                } ?>
            </div>
        <?php } ?>

        <form action="http://<?php echo APP_HOST; ?>/category/excluir" method="post" id="form_cadastro">
            <input type="hidden" class="form-control" name="idCategory" id="idCategory" value="<?php echo $viewVar['category']->getIdCategory(); ?>">
            <br />

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="name" id="nome" value="<?php echo $viewVar['category']->getName(); ?>" readonly>
            </div>

            <br />
            <div class="panel panel-danger">
                <div class="panel-body">
                    Deseja realmente excluir a categoria: <b><?= $viewVar['category']->getName() ?></b>?
                </div>
                <br />
                <div class="panel-footer">
                    <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</button>
                    <a href="http://<?php echo APP_HOST; ?>/category" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
