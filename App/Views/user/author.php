<main class="container">
  <div class="authorContainer">
    <div class="authorProfile">

      <div>
        <div class="avatar">
          <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" alt="" />
        </div>

        <strong><?= $viewVar['user']->getName() ?></strong>

        <p><?php echo $viewVar['user']->getDescription(); ?></p>

        <button class="buttonSubmit">Voltar</button>
      </div>

    </div>
    <div class="authorPostsContainer">
      <h2>Meus Posts</h2>
      <div class="authorPosts">

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