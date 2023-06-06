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
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['article']->getUser()->getAvatar(); ?>" class="d-flex align-items-center justify-content-center" style="width: 20px; height: 20px; border-radius: 9999px;" alt="user" />
              <?= $viewVar['article']->getUser()->getName(); ?>
            </a>
          </li>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
            <?= $viewVar['article']->getCreatedAt()->format('d/m/Y') ?>
          </li>
          <li>
          <button class="like-button" onclick="likeButtonClick(event)" data-article-id="<?= $viewVar['article']->getIdArticle(); ?>">
  <span class="heart">&#10084;</span>
  <span class="like-count"><?= $viewVar['likeCount'] ?></span>
</button>

           
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
            <div class="avatar">
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar(); ?>" alt="user" />
            </div>
            <form class="newCommentsForm" action="http://<?php echo APP_HOST; ?>/article/comment/<?= $viewVar['article']->getIdArticle(); ?>" method="post" id="form_cadastro" >
              <textarea cols="70" rows="5" name="text" id="text" value="<?php echo $Sessao::retornaValorFormulario('text'); ?>" required></textarea>
              <div class="newCommentsFormFooter">
                <button type="submit" class="buttonSubmit">Comentar</button>
              </div>
            </form>
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
                  <?php if ($comment->getUser()->getName() == $viewVar['user']->getName() || $viewVar['user']->getType() == "adm" ) { ?>
                    <div class="actions">
                      <div class="d-flex align-items-center gap-2">
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                        <?= $comment->getCreatedAt()->format('d/m/Y') ?>
                      </div>
                      <button class="negado" style="background-color: #FF57B2;"><img src="http://<?php echo APP_HOST; ?>/public/icons/trash.png" alt="apagar comentario" /></button>
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

<script>
function likeButtonClick(event) {
  event.preventDefault();

  var heartElement = event.target;
  var likeCountElement = heartElement.nextElementSibling;
  var articleId = heartElement.parentElement.getAttribute('data-article-id');

  if (heartElement.classList.contains('clicked')) {
    heartElement.classList.remove('clicked');
    var likeCount = parseInt(likeCountElement.textContent) - 1;
    likeCountElement.textContent = likeCount;
    sendLikeRequest(articleId, false);
  } else {
    heartElement.classList.add('clicked');
    var likeCount = parseInt(likeCountElement.textContent) + 1;
    likeCountElement.textContent = likeCount;
    sendLikeRequest(articleId, true);
  }
}

function sendLikeRequest(articleId, likeStatus) {
  var url = 'http://<?php echo APP_HOST; ?>/article/like/' + articleId + '/' + likeStatus;

  // Use a biblioteca jQuery para fazer a requisição AJAX
  $.ajax({
    url: url,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        // Ação de sucesso (opcional)
      } else {
        // Ação em caso de falha (opcional)
      }
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
}
</script>
