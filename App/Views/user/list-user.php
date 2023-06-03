<div class="container">
  <h2 class="text-center" style="margin-top: 5rem;">Controle de Usuarios</h2>
  <table class="table">
  
    <thead>
      <th class="text-center">ID</th>
      <th class="text-center" style="width: 40px;"></th> <!-- AVATAr -->
      <th>Nome do Usuario</th>
      <th class="text-center">Tipo De Permissão</th>
      <th class="text-center"></th> <!-- Excluir -->
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
          <select class="select" name="idCategory" id="idCategory" required style="margin-bottom: 0px; width: 80%;">
          <?php if ($user->getType() == "adm"){ ?>
            <option value="2">Administrador</option>
            <?php } else {?>
            <option value="2">Usuario</option>
            <?php } ?>
          </select>
        </td>
        <td class="text-right">
          <div class="actions" style="justify-content: center;">
            <button class="negado" type="button" style="background-color: #FF57B2;" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="http://<?php echo APP_HOST; ?>/public/icons/pencil.png" alt="apagar comentario" /></button>


          </div>
        </td>
      </tr>

<?php }?>

    </tbody>
  </table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Permissão</h1>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
        </button>
      </div>
      <div class="modal-body">
      <div class="d-flex flex-column align-items-center justify-content-center gap-3">
          <img src="http://<?php echo APP_HOST; ?>/public/icons/question.png" alt="question" />
          <h3 class="text-center">Deseja Realmente Tornar esse um usuario Administrador?</h3>
          <p class="obs-modal">OBS: Lembrando que isso é permanente</p>
          <div class="actions" style="margin-left: 0px;">
            <button class="aceito">
              <img src="http://<?php echo APP_HOST; ?>/public/icons/confirm.png" alt="confirmar postagem" />
            </button>
            <button class="negado" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>