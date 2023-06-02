<div class="loginContainer" style="flex-direction: column; margin-top: 8rem;">
  <h2>Cadastro de Post</h2>
  <div class="containerCadastroPost" style="padding: 2rem">
    <h4>Informações</h4>
    <?php if ($Sessao::retornaErro()) { ?>
      <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
          echo $mensagem . "<br />";
        } ?>
      </div>
    <?php } ?>

    <form action="http://<?php echo APP_HOST; ?>/article/salvar" method="post" id="form_cadastro" enctype="multipart/form-data">
      <input type="hidden" name="idUser" id="idUser" value="<?php echo $idUser; ?>">
      
      <label>
        <span>
          Título da Postagem
        </span>
        <input type="text" placeholder="Digite o Titulo de Post" name="title" id="title" value="<?php echo $Sessao::retornaValorFormulario('title'); ?>" required />
      </label>

      <label>
        <span>
          Resumo do Artigo
        </span>
        <input type="text" placeholder="Esse aqui vai aparecer destacado :)" name="resume" id="resume" value="<?php echo $Sessao::retornaValorFormulario('resume'); ?>" required />
      </label>

      <label for="idCategory">
        <span>
        Categoria
        </span>
      <select class="select"  name="idCategory" id="idCategory" required>
        <?php foreach ($viewVar['listCategory'] as $category) { ?>
          <option value="<?= $category->getIdCategory() ?>"><?= $category->getName() ?></option>
        <?php } ?>
      </select> 
        </label>


      <label>
        <span>
          Imagem
        </span>
        <input type="file" class="form-control" id="image" name="image" accept="image/*" />
        <p class="help-block">JPG, PNG ou GIF.</p>
      </label>

      <label>
        <span>
          Conteúdo
        </span>
        <textarea rows="8" name="text" id="text" value="<?php echo $Sessao::retornaValorFormulario('text'); ?>" required></textarea>
      </label>


      <button type="submit" class="buttonSubmit">Cadastrar</button>
      <a href="http://<?php echo APP_HOST; ?>/home" class="buttonCancel">
       Cancelar </a>
    </form>
  </div>
</div>