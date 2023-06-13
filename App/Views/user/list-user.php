<div class="container">
  <h2 class="text-center" style="margin-top: 5rem;">Controle de Usuários</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center" style="width: 40px;"></th>
        <th>Nome do Usuário</th>
        <th class="text-center">Tipo de Permissão</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($viewVar['users'] as $user) { ?>
        <tr>
          <td class="text-center"><?= $user->getIdUser() ?></td>
          <td>
            <div class="avatar" style="height: 36px; width: 36px;">
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" alt="user" />
            </div>
          </td>
          <td><?= $user->getName() ?></td>
          <td class="text-center">
            <select class="select" name="idCategory" id="idCategory" disabled style="margin-bottom: 0px; width: 80%;">
              <?php if ($user->getType() == "adm") { ?>
                <option value="2">Administrador</option>
              <?php } elseif ($user->getType() == "user" && $user->getStats() == "banned") { ?>
                <option value="2">Usuário banido</option>
              <?php } elseif ($user->getType()) { ?>
                <option value="2">Usuário</option>
              <?php } ?>
            </select>
          </td>
          <td class="text-right">
            <div class="actions" style="justify-content: center;">
              <?php if ($user->getType() != "adm" && $user->getStats() != "banned") { ?>
                <button class="negado" type="button" style="background-color: #FF57B2;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $user->getIdUser() ?>">
                  <img src="http://<?php echo APP_HOST; ?>/public/icons/pencil.png" alt="tornar administrador" />
                </button>
                <button class="banir" type="button" style="background-color: #FF57B2;" data-bs-toggle="modal" data-bs-target="#banirModal<?= $user->getIdUser() ?>">
                  &#x1F6AB;
                </button>
              <?php } elseif ($user->getStats() == "banned") { ?>
                <button class="banir" type="button" style="background-color: #FF57B2;">
                  Banido
                </button>
              <?php } else { ?>
                <button class="negado" type="button" style="background-color: #FF57B2; width:40px;">
                  &#x2654;
                </button>
              <?php } ?>

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php foreach ($viewVar['users'] as $user) {
  if ($user->getType() != "adm") { ?>
    <div class="modal fade" id="exampleModal<?= $user->getIdUser() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Permissão</h1>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
              <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="fechar" />
            </button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-column align-items-center justify-content-center gap-3">
              <img src="http://<?php echo APP_HOST; ?>/public/icons/king.svg" style="width: 200px; height: 200px;" alt="question" />
              <h3 class="text-center">Deseja realmente tornar esse usuário um administrador?</h3>
              <p class="obs-modal">OBS: Lembrando que isso é permanente</p>
              <div class="actions" style="margin-left: 0px;">
                <form method="post" action="http://<?php echo APP_HOST; ?>/user/permissao/<?= $user->getIdUser() ?>">
                  <button type="submit" class="aceito">
                    <img src="http://<?php echo APP_HOST; ?>/public/icons/confirm.png" alt="confirmar" />
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }
} ?>

<?php foreach ($viewVar['users'] as $user) {
  if ($user->getType() != "adm") { ?>
    <div class="modal fade" id="banirModal<?= $user->getIdUser() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Banir Usuário</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Deseja banir o usuário <?= $user->getName() ?>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form method="post" action="http://<?php echo APP_HOST; ?>/user/banir/<?= $user->getIdUser() ?>">
              <button type="submit" class="btn btn-danger">
                Banir
              </button>
            </form>

          </div>
        </div>
      </div>
    </div>
<?php }
} ?>