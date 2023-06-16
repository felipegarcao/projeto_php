<body>
  <main class="container">
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

        <form class="d-flex align-items-center gap-2 justify-content-center mb-4" method="GET">
          <select class="select" name="status" id="status" onchange="this.form.submit()">
            <option value="">Todos</option>
            <option value="Aproved" <?= (isset($_GET['status']) && $_GET['status'] == 'Aproved') ? 'selected' : '' ?>>Aprovados</option>
            <option value="Pending" <?= (isset($_GET['status']) && $_GET['status'] == 'Pending') ? 'selected' : '' ?>>Pendentes</option>
            <option value="Denied" <?= (isset($_GET['status']) && $_GET['status'] == 'Denied') ? 'selected' : '' ?>>Negados</option>
          </select>
        </form>

        <?php
        $filteredArticles = [];
        $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

        foreach ($viewVar['articleExibition'] as $article) {
          if ($statusFilter === '' || $article->getStatus() === $statusFilter) {
            $filteredArticles[] = $article;
          }
        }

        if (empty($filteredArticles)) {
          if ($statusFilter === 'Denied') { ?>
            <div class="alert alert-info" role="alert">Nenhum artigo negado encontrado</div>
          <?php } else { ?>
            <div class="alert alert-info" role="alert">Nenhum artigo encontrado</div>
          <?php }
        } else {
          foreach ($filteredArticles as $article) {
            ?>
            <div class="cardContainer">
              <?php if ($article->getStatus() == "Aproved") { ?>
                <div class="flag aceito">
                  <span>Aprovado</span>
                </div>
              <?php } elseif ($article->getStatus() == "Pending") { ?>
                <div class="flag pendente">
                  <span>Pendente</span>
                </div>
                <button class="position-absolute btn" style="right: 20px; top: 10px;">
                  <a href="http://<?= APP_HOST ?>/article/edit/<?= $article->getIdArticle() ?>"  class="pencilEdit">
                    <img src="http://<?php echo APP_HOST; ?>/public/icons/pencil.png" alt="editar" />
                  </a>
                </button>
              <?php } elseif ($article->getStatus() == "Denied") { ?>
                <div class="flag negado">
                  <span>Negado</span>
                </div>
                <button type="button" class="position-absolute btn" style="right: 20px; top: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $article->getIdArticle() ?>">
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/warning.png" alt="visualizar justificativa de negação" />
                </button>
              <?php } ?>

              <header style="position: relative;"> 
                <div style="position: absolute; top: 0; right: -135px;">
                  <a href="http://<?= APP_HOST ?>/article/exclusao/<?= $article->getIdArticle() ?>" class="closePost" >
                      <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="apagar" />
                  </a>
                </div>
                <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
                  <strong class="text-center"><?= $article->getTitle() ?></strong>
                </a>
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
          <?php }
        } ?>
      </div>
    <?php } ?>

    <?php foreach ($viewVar['articleExibition'] as $article) {
      if ($article->getStatus() == "Denied") { ?>
        <div class="modal fade" id="exampleModal<?= $article->getIdArticle() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <img src="http://<?php echo APP_HOST; ?>/public/icons/warning-big.png" alt="visualizar justificativa de negação" />
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
              <div class="modal-footer">
                <button type="button" class="btn negado" style="color: #FF57B2;" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
    <?php }
    } ?>
  </main>
</body>
