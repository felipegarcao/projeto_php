<body>
  <main class="container">

    <?php if (is_null($viewVar['listArticle'])) { ?>
    <div class="alert alert-info" role="alert">Nenhum artigo postado :c</div>
    <?php } else {
      if ($Sessao::retornaMensagem()) { ?>
    <div class="alert alert-warning" role="alert">
      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?= $Sessao::retornaMensagem() ?>
      <br>
    </div>
    <?php } ?>
    <div class="posts">



      <select class="select" name="idCategory" id="idCategory" required>
        <?php foreach ($viewVar['listCategory'] as $category) { ?>
        <option value="<?= $category->getIdCategory() ?>"><?= $category->getName() ?></option>
        <?php } ?>
      </select>


      
      <?php foreach ($viewVar['listArticle'] as $article) { ?>
      <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
        <strong><?= $article->getTitle() ?></strong>
        <p><?= $article->getResume() ?></p>
        <ul>
          <li class="d-flex align-items-center">
            <time> <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
              <?= $article->getCreatedAt()->format('d/m/Y') ?></time>
          </li>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />

            <?= $viewVar['user']->getName() ?>
          </li>
          <li>
              

          </li>
        </ul>
      </a>
      <?php } ?>
    </div>
    <?php } ?>
  </main>
</body>