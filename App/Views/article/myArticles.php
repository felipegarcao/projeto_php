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
          </select>
          <select class="select" name="status" id="status" onchange="this.form.submit()">
            <option value="">Todos</option>
            <option value="Aproved" <?= (isset($_GET['status']) && $_GET['status'] == 'Aproved') ? 'selected' : '' ?>>Aprovados</option>
            <option value="Pending" <?= (isset($_GET['status']) && $_GET['status'] == 'Pending') ? 'selected' : '' ?>>Pendentes</option>
            <option value="Denied" <?= (isset($_GET['status']) && $_GET['status'] == 'Denied') ? 'selected' : '' ?>>Negados</option>
          </select>
        </form>

        <?php foreach ($viewVar['articleExibition'] as $article) {
          $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

          if ($statusFilter === '' || $article->getStatus() === $statusFilter) {
            ?>
            <a href="http://<?= APP_HOST ?>/article/detalhes/<?= $article->getIdArticle() ?>">
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
                    <a href="http://<?= APP_HOST ?>/article/edit/<?= $article->getIdArticle() ?>">
                      <img src="http://<?php echo APP_HOST; ?>/public/icons/pencil.png" alt="editar" />
                    </a>
                  </button>
                <?php } elseif ($article->getStatus() == "Denied") { ?>
                  <div class="flag negado">
                    <span>Negado</span>
                  </div>
                  <button class="position-absolute btn" style="right: 20px; top: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $article->getIdArticle() ?>">
                    <img src="http://<?php echo APP_HOST; ?>/public/icons/warning.png" alt="visualizar justificativa de negação" />
                  </button>
                <?php } ?>

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
          <?php }
        } ?>
      </div>
    <?php } ?>
  </main>
</body>
