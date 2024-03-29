<?php if (is_null($viewVar['articleSolicitation'])) { ?>
  <div class="alert alert-info" role="alert">Nenhum artigo postado :c</div>
<?php } else {
  if ($Sessao::retornaMensagem()) { ?>
    <div class="alert alert-warning" role="alert">
      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?= $Sessao::retornaMensagem() ?>
      <br>
    </div>
  <?php }
} ?>

<div class="container containerSolicitacao">
  <h1>Solicitações</h1>
  <?php foreach ($viewVar['articleSolicitation'] as $article) { ?>
    <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
      <div class="cardContainer">
        <header>
          <h3 class="title-solicitation"><?= $article->getTitle() ?></h3>
          <div class="detalhesPostInfo">
            <ul>
              <li>
                <img src="http://<?= APP_HOST ?>/public/icons/calendar.png" alt="calendario" />
                <?= $article->getCreatedAt()->format('d/m/Y') ?>
              </li>
              <li>
                <img src="http://<?= APP_HOST ?>/public/icons/user.png" alt="user" />
                <?= $article->getUser()->getName() ?>
              </li>
            </ul>
          </div>
        </header>
        <p>
          <?= $article->getResume() ?>
        </p>

        <div class="actions">
          <a href="http://<?= APP_HOST ?>/article/aproved/<?= $article->getIdArticle() ?>">
            <button class="aceito">
              <img src="http://<?= APP_HOST ?>/public/icons/confirm.png" alt="confirmar postagem" />
            </button>
          </a>
          <button class="negado" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $article->getIdArticle() ?>">
            <img src="http://<?= APP_HOST ?>/public/icons/x.png" alt="negar postagem" />
          </button>
        </div>
      </div>
    </a>

    <div class="modal fade" id="exampleModal<?= $article->getIdArticle() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Justificativa</h1>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
              <img src="http://<?= APP_HOST ?>/public/icons/x.png" alt="negar postagem" />
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="http://<?= APP_HOST ?>/article/denied/<?= $article->getIdArticle() ?>">
              <textarea rows="9" name="feedback" id="feedback"><?php echo $Sessao::retornaValorFormulario('feedback'); ?></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="negado" style="background-color: #FF57B2; width:100px; height:50px; color:white;">Finalizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
