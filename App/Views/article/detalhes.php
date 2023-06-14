<body>
  <img src="http://<?= APP_HOST ?>/public/images/articles/<?= $viewVar['article']->getImage() ?>" alt="Banner" class="banner" />
  <main class="container">
    <?php

    use App\Models\DAO\LikeDAO;

    if ($Sessao::retornaErro()) { ?>
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
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['article']->getUser()->getAvatar(); ?>" class="d-flex align-items-center justify-content-center" style="width: 20px; height: 20px; border-radius: 9999px;" alt="user" />
              <?= $viewVar['article']->getUser()->getName(); ?>
            </a>
          </li>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
            <?= $viewVar['article']->getCreatedAt()->format('d/m/Y') ?>
          </li>
          <li>
            <form method="POST" action="http://<?php echo APP_HOST; ?>/article/like/<?= $viewVar['article']->getIdArticle(); ?>">

              <?php if ($viewVar['user']->getStats() != "banned") { ?>
                <button id="likeButton" type="submit" name="likeButton" class="like-button" onclick="likeButtonClick(this);">
                <span class="heart" <?php if (isset($viewVar['likeStatus']) && $viewVar['likeStatus']) { ?>style="color:#FF57B2;" <?php } else { ?>style="background-color:none;" <?php } ?>>&#10084;</span>
                  <span class="like-count"><?= $viewVar['likeCount'] ?></span>
                </button>

              <?php } ?>
            </form>
          </li>
        </ul>
      </div>

      <article>
        <div class="postContent">
          <?= $viewVar['article']->getText(); ?>
        </div>
      </article>

      <footer>

        <div class="footerCointainer">
          <div class="newCommentsContainer">
            <?php if ($viewVar['user']->getStats() != "banned") { ?>
              <div class="avatar">
                <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar(); ?>" alt="user" />
              </div>
              <form class="newCommentsForm" action="http://<?php echo APP_HOST; ?>/article/comment/<?= $viewVar['article']->getIdArticle(); ?>" method="post" id="form_cadastro">
                <textarea cols="70" rows="5" name="text" id="text" value="<?php echo $Sessao::retornaValorFormulario('text'); ?>" required></textarea>
                <div class="newCommentsFormFooter">
                  <button type="submit" class="buttonSubmit">Comentar</button>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>

        <?php foreach ($viewVar['comments'] as $comment) { ?>
          <div class="CommentsContainer">
            <div class="avatar">
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $comment->getUser()->getAvatar() ?>" alt="user" />
            </div>
            <div class="Comments">
              <div class="postsTop">
                <ul>
                  <li>
                    <?= $comment->getUser()->getName() ?>
                  </li>
                  <?php if ($comment->getUser()->getName() == $viewVar['user']->getName() || $viewVar['user']->getType() == "adm") { ?>

                    <div class="actions">
                      <div class="d-flex align-items-center gap-2">
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                        <?= $comment->getCreatedAt()->format('d/m/Y') ?>
                      </div>
                      <a href="http://<?= APP_HOST ?>/article/excluirComentario/<?= $comment->getIdComment() ?>/<?= $viewVar['article']->getIdArticle() ?>" style="text-decoration: none; padding-bottom: 0px; border-bottom: 0px;">
                        <button class="negado" style="background-color: #FF57B2;">
                          <img src="http://<?php echo APP_HOST; ?>/public/icons/trash.png" alt="apagar comentario" />
                        </button>
                      </a>
                      <button class="negado" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/pencil.png" alt="apagar comentario" />
                      </button>
                    </div>
                  <?php } ?>
                </ul>
              </div>
              <p><?= $comment->getText() ?></p>
            </div>
          </div>
        <?php } ?>
      </footer>
    </div>
  </main>
</body>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Comentario</h1>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <textarea rows="9" name="feedback" id="feedback"></textarea>

      </div>
      <div class="actions">
        <button type="submit" class="aceito">Finalizar</button>
        </form>
      </div>
    </div>
  </div>
</div>




<script>
  function likeButtonClick(teste) {
    var likeCountElement = document.querySelector('.like-count');
    var heartElement = document.querySelector('.heart');

    if (heartElement.classList.contains('clicked')) {
      // Se já foi clicado, remover o like e atualizar o contador
      heartElement.classList.remove('clicked');
    } else {
      // Se ainda não foi clicado, adicionar o like e atualizar o contador
      heartElement.classList.add('clicked');
    }

  }
</script>