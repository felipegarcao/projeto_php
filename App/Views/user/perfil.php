<div class="loginContainer customContainer" style="margin-top: 8rem;">
  <div class="containerCadastroPost" style=" padding: 2rem;">
    <?php if ($Sessao::retornaErro()) { ?>
      <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
          echo $mensagem . "<br />";
        } ?>
      </div>
    <?php } ?>
    <form action="http://<?php echo APP_HOST; ?>/user/atualizar" method="post" id="form_cadastro" enctype="multipart/form-data">
      <input type="hidden" class="form-control" name="email" id="email" value="<?= $viewVar['user']->getEmail(); ?>">
      <div class="avatarCustomPerfil">
        <div class="avatar">
          <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" alt="" />
        </div>
      </div>

      <label>
        <span>
          Nome
        </span>
        <input type="text" name="name" value="<?php echo $viewVar['user']->getName(); ?>">
      </label>

      <label>
        <span>
          Imagem
        </span>
        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" />
      </label>

      <label>
        <span>
          Descrição
        </span>
        <textarea rows="8" name="description"><?php echo $viewVar['user']->getDescription(); ?></textarea>
      </label>

      <button type="submit" class="buttonSubmit">Confirmar</button>
      <a href="http://<?php echo APP_HOST; ?>/user/resetPassword/<?php echo $viewVar['user']->getIdUser(); ?>" class="buttonCancel">
       Resetar Senha </a>

    </form>
  </div>
</div>