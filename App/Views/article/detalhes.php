<body>
  <img src="http://<?= APP_HOST ?>/public/images/articles/<?= $viewVar['article']->getImage() ?>" alt="Banner" class="banner" />
  <main class="container">
  <?php if ($Sessao::retornaErro()) { ?>
  <div class="alert alert-warning" role="alert">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
      echo $mensagem . "<br />";
    } ?>
    </div>
    <?php } ?>
    <div class="posts">
      <div class="postsTop">
        <h1><?= $viewVar['article']->getTitle(); ?></h1>
        <ul>
          <li>
            <a class="custom" href="http://<?php echo APP_HOST; ?>/user/author/<?= $viewVar['article']->getUser()->getIdUser(); ?>">
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['article']->getUser()->getAvatar(); ?>" style="width: 30px;" alt="user" />
              <?= $viewVar['article']->getUser()->getName(); ?>
            </a>
          </li>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
            <?= $viewVar['article']->getCreatedAt()->format('d/m/Y') ?>
          </li>
        </ul>
      </div>

      <article>
        <div class="postContent">
        <?= $viewVar['article']->getText(); ?>
      </article>

      <footer>
        <div class="footerCointainer">
          <div class="newCommentsContainer">
            <div class="avatar">
              <img src="http://github.com/felipegarcao.png" alt="" />
            </div>
            <form class="newCommentsForm">
              <textarea cols="70" rows="5"></textarea>
              <div class="newCommentsFormFooter">
                <button type="submit" class="buttonSubmit">Comentar</button>
              </div>
            </form>
          </div>
        </div>


        <div class="CommentsContainer">
          <div class="avatar">
            <img src="http://github.com/felipegarcao.png" alt="" />
          </div>
          <div class="Comments">
            <div class="postsTop">
              <ul>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                  Luis Felipe Garção Silva
                </li>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                  16/05/2023
                </li>

                <div class="actions">
                <button class="negado"><img src="http://<?php echo APP_HOST; ?>/public/icons/trash.png" alt="apagar comentario" /></button>
                  </div>

              </ul>
            </div>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius saepe molestias pariatur tempora beatae
              possimus voluptatum aut sequi magni laborum atque eos iste, accusamus fugiat illo quia ipsum nihil animi?
            </p>

          </div>
        </div>
        <div class="CommentsContainer">
          <div class="avatar">
            <img src="http://github.com/felipegarcao.png" alt="" />
          </div>
          <div class="Comments">
            <div class="postsTop">
              <ul>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                  Luis Felipe Garção Silva
                </li>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                  16/05/2023
                </li>

                <div class="actions">
                <button class="negado"><img src="http://<?php echo APP_HOST; ?>/public/icons/trash.png" alt="apagar comentario" /></button>
                  </div>

              </ul>
            </div>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius saepe molestias pariatur tempora beatae
              possimus voluptatum aut sequi magni laborum atque eos iste, accusamus fugiat illo quia ipsum nihil animi?
            </p>

          </div>
        </div>

        <div class="CommentsContainer">
          <div class="avatar">
            <img src="http://github.com/felipegarcao.png" alt="" />
          </div>
          <div class="Comments">
            <div class="postsTop">
              <ul>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                  Luis Felipe Garção Silva
                </li>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                  16/05/2023
                </li>

                <div class="actions">
                <button class="negado"><img src="http://<?php echo APP_HOST; ?>/public/icons/trash.png" alt="apagar comentario" /></button>
                  </div>

              </ul>
            </div>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius saepe molestias pariatur tempora beatae
              possimus voluptatum aut sequi magni laborum atque eos iste, accusamus fugiat illo quia ipsum nihil animi?
            </p>
          </div>
        </div>
      </footer>

    </div>
  </main>
</body>