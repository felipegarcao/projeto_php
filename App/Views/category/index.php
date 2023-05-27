<div class="container">
    <div class="row">
        <br />
        <div class="col-md-2 mt-4">
            <a href="http://<?php echo APP_HOST; ?>/category/cadastro" class="buttonSubmit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar</a>
        </div>
        <div class="col-md-12">
            <hr>
            
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $Sessao::retornaMensagem() ?> 
                    <br>
                </div>
            <?php } ?>            

            <?php if(!count($viewVar['listCategory'])){ ?>
                <div class="alert alert-info" role="alert">Nenhum fornecedor encontrado</div>
            <?php } else { ?>      
                
                <div class="row mx-auto">
                <div class="col-md-3" style="width: 200px;">
                    
                </div>
                <div class="col-md-3" style="width: 200px;">TESTE</div>
                <div class="col-md-3" style="width: 200px;">TESTE</div>
                <div class="col-md-3" style="width: 200px;">TESTE</div>
                </div>
                


                <!-- <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="table-success" style="font-weight: bold">
                            <td class="info">Nome</td>
                            <td class="info text-center">Ação</td>
                        </tr>
                        <?php foreach($viewVar['listCategory'] as $category) { ?>
                            <tr>
                                <td><?= $category->getName() ?></td>
                                <td style="width:15%">
                                    <a href="http://<?= APP_HOST ?>/category/edicao/<?= $category->getIdCategory() ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar </a>
                                    <a href="http://<?= APP_HOST ?>/category/exclusao/<?= $category->getIdCategory() ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir </a>   
                                </td>
                            </tr>
                        <?php } ?>
                    </table> -->
                <!-- </div> -->
            <?php } ?>
        </div>
    </div>
</div>