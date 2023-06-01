<?php if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){ ?>
                    <li <?php if($viewVar['nameController'] == "UserController") { ?> class="active" <?php } ?>>
                        <a class="nav-link" href="http://<?= APP_HOST.'/' ?>">
                    </li>
                <?php } else { ?>
<header class="headerContainer">
  <div class="headerContent">
    <a href="http://<?php echo APP_HOST; ?>/home">
      <img src=" http://<?php echo APP_HOST; ?>/public/icons/logo.png" alt="Logo" />
    </a>
   
    <div class="container-popover">
      <div class="popover-trigger">
        <button class="popover-btn">
          <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar(); ?>" style="width: 40px; border-radius:100px;" alt="user" />

        </button>
        <div class="popover-content">
          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/user/perfil">
            Meu Perfil
          </a>

          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/article/myArticles">
            Meus Posts
          </a>

          <a class="popover-item"  href="http://<?php echo APP_HOST; ?>/article/cadastro">
            Cadastrar
          </a>

          
      <?php if ($viewVar['user']->getType() == "adm") {?>
          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/article/solicitation">
            Solicitações
          </a>

          <a class="popover-item" href="http://<?php echo APP_HOST; ?>/category/index">
            Categorias
          </a>
<?php
     }
?>


          <a class="popover-item" href="http://<?= APP_HOST.'/user/logout'?>">Sair</a>

        </div>
      </div>
      <?php
}
?>
    </div>

  </div>

</header>