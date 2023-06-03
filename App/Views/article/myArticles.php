<?php if (is_null($viewVar['articleExibition'])) { ?>
<div class="alert alert-info" role="alert">Nenhum artigo postado :c</div>
<?php } else {
    if ($Sessao::retornaMensagem()) { ?>
<div class="alert alert-warning" role="alert">
  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?= $Sessao::retornaMensagem() ?>
  <br>
</div>
<?php } ?>
<div class="container containerSolicitacao">
  <h1>Meus Posts</h1>

  <form class="d-flex align-items-center gap-2 justify-content-center mb-4">
<select class="select" name="idCategory" id="idCategory" required>
        <?php foreach ($viewVar['listCategory'] as $category) { ?>
        <option value="<?= $category->getIdCategory() ?>"><?= $category->getName() ?></option>
        <?php } ?>
      </select>
      <button class="buttonSubmit" style="height: 33px">
      <img src="http://<?php echo APP_HOST; ?>/public/icons/search.png" alt="buscar" />
    </button>

</form>

  <?php foreach ($viewVar['articleExibition'] as $article) {
            if ($article->getStatus() == "Aproved") {
        ?>
  <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
    <div class="cardContainer">
      <div class="flag aceito">
        <span>Aprovado</span>
      </div>
      <header>
        <strong class="text-center"><?= $article->getTitle() ?></strong>
        <div class="detalhesPostInfo">
          <ul>
            <li>
              <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
              <time><?= $article->getCreatedAt()->format('d/m/Y') ?></time>
            </li>
            <li>
              <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
              <?= $viewVar['user']->getName() ?>
            </li>
          </ul>
        </div>
      </header>

      <p>
        <?= $article->getResume() ?>
      </p>
    </div>
  </a>
  <?php
            } elseif ($article->getStatus() == "Pending") {
            ?>
  <div class="cardContainer" style="position: relative">
    <div class="flag pendente">
      <span>Pendente</span>
    </div>
    <button class="position-absolute btn" style="right: 20px; top: 10px;">
     <a href="http://<?= APP_HOST ?>/article/edit/<?= $article->getIdArticle() ?>">
      <img src="http://<?php echo APP_HOST; ?>/public/icons/pencil.png" alt="editar" />
      </a>
    </button>
    <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
      <header>
        <strong class="text-center"><?= $article->getTitle() ?></strong>
        <div class="detalhesPostInfo">
          <ul>
            <li>
              <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
              <time><?= $article->getCreatedAt()->format('d/m/Y') ?></time>
            </li>
            <li>
              <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
              <?= $viewVar['user']->getName() ?>
            </li>
          </ul>
        </div>
      </header>
    </a>
    <p>
      <?= $article->getResume() ?>
    </p>
  </div>
  <?php
            } elseif ($article->getStatus() == "Denied") {
            ?>
  <div class="cardContainer" style="position: relative;">
    <div class="flag negado">
      <span>Negado</span>
    </div>
    <button class="position-absolute btn" style="right: 20px; top: 10px;" data-bs-toggle="modal"
      data-bs-target="#exampleModal<?= $article->getIdArticle() ?>">
      <img src="http://<?php echo APP_HOST; ?>/public/icons/warning.png" alt="visualizar justificativa de negação" />
    </button>

    <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
      <header>
        <strong class="text-center"><?= $article->getTitle() ?></strong>
        <div class="detalhesPostInfo">
          <ul>
            <li>
              <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
              <time><?= $article->getCreatedAt()->format('d/m/Y') ?></time>
            </li>
            <li>
              <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
              <?= $viewVar['user']->getName() ?>

            </li>
          </ul>
        </div>
      </header>
    </a>

    <p>
      <?= $article->getResume() ?>
    </p>
  </div>


  <div class="modal fade" id="exampleModal<?= $article->getIdArticle() ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title fs-5" id="exampleModalLabel">Justificativa</p>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
            <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
          </button>
        </div>
        <div class="modal-body" style="padding: 2rem;">
          <div class="d-flex gap-3">

            <div>
              <img src="http://<?php echo APP_HOST; ?>/public/icons/warning-big.png"
                alt="visualizar justificativa de negação" />
            </div>
            <div class="detalhesPostInfo">
              <ul>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                  <time><?= $article->getCreatedAt()->format('d/m/Y') ?></time>
                </li>
                <li>
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                  <?= $viewVar['user']->getName() ?>
                </li>
              </ul>
              <p style="margin-left: 2rem; text-align: justify; color: #D7D7D7; font-size: 14px; line-height: 2;">
                <?= $article->getFeedback() ?>
              </p>
            </div>


          </div>

        </div>

        <div class="actions">
          <button type="button" class="negado" style="color: #FF57B2;" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  <?php
            }
        }
    }
    ?>