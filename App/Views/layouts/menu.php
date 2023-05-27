<header class="headerContainer">
  <div class="headerContent">
    <a href="http://<?php echo APP_HOST; ?>/home/">
      <img src=" http://<?php echo APP_HOST; ?>/public/icons/logo.png" alt="Logo" />
    </a>

    <div class="container-popover">
      <div class="popover-trigger">
        <button class="popover-btn">
          <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />

        </button>
        <div class="popover-content">
          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/user/perfil">
            Meu Perfil
          </a>

          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/posts/meus-posts">
            Meus Posts
          </a>

          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/posts/cadastrar">
            Cadastrar
          </a>

          <!-- caso seja adm -->

          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/posts/solicitacoes">
            Solicitações
          </a>

          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/category/index">
            Categorias
          </a>



          <a class="popover-item" href="">Sair</a>

        </div>
      </div>
    </div>

  </div>
</header>