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

<?php if ($viewVar['user']->getStats() == "banned") { ?>

  <div class="alert alert-warning" role="alert">
  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo "Você foi banido! Suas publicações aprovadas ainda serão exibidas e você poderá ver publicações de outros usuários";?>
  <br>
</div>

<?php } ?>
<div class="posts">


<form class="d-flex align-items-center gap-2" action="http://<?php echo APP_HOST; ?>/home/getByCategory" method="POST">
  <select class="select" name="idCategory" id="idCategory" required onchange="submitForm(this)">
    <option value="0" <?= isset($viewVar['selectedCategory']) && $viewVar['selectedCategory']->getIdCategory() == 0 ? 'selected' : '' ?>>Todos</option>
    <?php foreach ($viewVar['listCategory'] as $category) { ?>
      <?php if (isset($viewVar['selectedCategory']) && $category->getIdCategory() == $viewVar['selectedCategory']->getIdCategory()) { ?>
        <option value="<?= $category->getIdCategory() ?>" selected><?= $category->getName() ?></option>
      <?php } else { ?>
        <option value="<?= $category->getIdCategory() ?>"><?= $category->getName() ?></option>
      <?php } ?>
    <?php } ?>
  </select>

</form>

<script>
  function submitForm(selectElement) {
    selectElement.parentNode.submit();
  }
</script>

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
        <?= $article->getUser()->getName() ?>
      </li>
      <li>
      </li>
    </ul>
  </a>
<?php } ?>

<?php if (isset($viewVar['noArticlesMessage'])) { ?>
  <div class="alert alert-info" role="alert"><?= $viewVar['noArticlesMessage'] ?></div>
<?php } ?>

</div>
<?php } ?>
</main>
</body>
