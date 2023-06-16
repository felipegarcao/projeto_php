<div class="loginContainer" style="flex-direction: column; margin-top: 2rem;">
  <h2>Atualizar Post</h2>
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

    <form method="post" action="http://<?= APP_HOST ?>/article/update/<?= $viewVar['article']->getIdArticle() ?>" id="form_cadastro" enctype="multipart/form-data">
      <input type="hidden" name="idUser" id="idUser" value="<?php echo $idUser; ?>">
      
      <label>
        <span>
          Título da Postagem
        </span>
        <input type="text" placeholder="Digite o Título do Post" name="title" id="title" value="<?php echo isset($viewVar['article']) ? $viewVar['article']->getTitle() : ''; ?>" required />
      </label>

      <label>
        <span>
          Resumo do Artigo
        </span>
        <input type="text" placeholder="Esse aqui vai aparecer destacado :)" name="resume" id="resume" value="<?php echo isset($viewVar['article']) ? $viewVar['article']->getResume() : ''; ?>" required />
      </label>
      <label for="idCategory">
  <span>
    Categoria
  </span>
  <select class="select" name="idCategory" id="idCategory" required>
    <?php foreach ($viewVar['listCategory'] as $category) { ?>
      <option value="<?= $category->getIdCategory() ?>" <?php if ($category->getIdCategory() == $viewVar['article']->getCategory()->getIdCategory()) { echo 'selected'; } ?>>
        <?= $category->getName() ?>
      </option>
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
        <textarea rows="8" name="text" id="text" required><?php echo isset($viewVar['article']) ? $viewVar['article']->getText() : ''; ?></textarea>
      </label>

      <button type="submit" class="buttonSubmit">Atualizar</button>
      <a href="http://<?php echo APP_HOST; ?>/article/myArticles" class="buttonCancel">
        Cancelar
      </a>
    </form>
  </div>
</div>
