<div class="container">
    <div class="row">
        <br />
        <div class="col-md-2 mt-5">
            <a href="http://<?php echo APP_HOST; ?>/category/cadastro" class="buttonSubmit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar</a>
        </div>
        <div class="col-md-12">
            <hr>

            <?php if ($Sessao::retornaMensagem()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $Sessao::retornaMensagem() ?>
                    <br>
                </div>
            <?php } ?>

            <?php if (!count($viewVar['listCategory'])) { ?>
                <div class="alert alert-info" role="alert">Nenhum fornecedor encontrado</div>
            <?php } else { ?>
                <div class="containerCategory">
                <?php foreach ($viewVar['listCategory'] as $category) { ?>
                    <div class="card-category">
                        <strong><?= $category->getName() ?></strong>
                        <div class="d-flex justify-content-end gap-3 align-items-end mt-5">
                            <a href="http://<?= APP_HOST ?>/category/edicao/<?= $category->getIdCategory() ?>" class="editar">
                                <img src="http://<?php echo APP_HOST; ?>/public/icons/pencil.png" alt="editar" />
                            </a>
                            <a href="http://<?= APP_HOST ?>/category/exclusao/<?= $category->getIdCategory() ?>" class="excluir">
                                <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="apagar" />
                            </a>
                        </div>
                    </div>
                    <?php } ?>
            <?php } ?>
                </div>


        </div>
    </div>
</div>