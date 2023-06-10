<main class="container">
  <div class="authorContainer">
    <div class="authorProfile">

      <div>
        <div class="avatar">
          <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['userList']->getAvatar() ?>" alt="" />
        </div>

        <strong><?= $viewVar['userList']->getName() ?></strong>

        <p><?php echo $viewVar['userList']->getDescription(); ?></p>

      </div>

    </div>
    <div class="authorPostsContainer">
      <h2>Meus Posts</h2>
      <div class="authorPosts">
      <?php if (empty($viewVar['articleExibitionUser'])) { ?>
    <div class="alert alert-info" role="alert">Nenhum artigo postado :c</div>
<?php } ?>

        <div class="postsAuthorSelected">
          <?php foreach ($viewVar['articleExibitionUser'] as $article) { ?>
          <a href="http://<?php echo APP_HOST; ?>/article/detalhes/<?= $article->getIdArticle() ?>">
            <strong><?= $article->getTitle() ?></strong>
            <p><?= $article->getResume() ?></p>
            <ul>
              <li>
                <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                <time> <?= $article->getCreatedAt()->format('d/m/Y') ?> </time>
              </li>

            </ul>
          </a>
          <?PHP }?>
        </div>

      </div>
    </div>
  </div>
</main>