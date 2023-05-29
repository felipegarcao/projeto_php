
<body>
  <main class="container">
  <?php if(is_null($viewVar['listArticle'])) { ?>
  <div class="alert alert-info" role="alert">Nenhum artigo postado :c</div>
<?php } else {

  if($Sessao::retornaMensagem()){ ?>
  <div class="alert alert-warning" role="alert">
      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?= $Sessao::retornaMensagem() ?> 
      <br>
  </div>
<?php } ?>  

  <div class="posts">
  <?php foreach($viewVar['listArticle'] as $article) { ?>
      <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
        <strong><?= $article->getTitle() ?></strong>
        <p><?= $article->getResume() ?></p>
        <ul>
          <li>
            <img src="./public/image/articles/<?= $article->Image() ?>" alt="Article" />
            <time><?= $article->getCreatedAt() ?></time>
          </li>
          <li>
            <img src="./public/image/user/<?= $article->getUser()->getImage() ?>" alt="Article" />
            <p><?= $article->getUser()->getName() ?></p>
          </li>
        </ul>
      </a>
      <?php } ?>

    </div>
    <?php } ?>  
  </main>
</body>