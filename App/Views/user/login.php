<div class="loginContainer">
  <div class="loginWrapper">
    <div class="loginHeader">
      <img src="http://<?php echo htmlspecialchars(APP_HOST); ?>/public/icons/logo.png" alt="Logo" />
      <p>Faça Login e comece a usar!</p>
    </div>

    <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
      <?php } ?>     

    <form action="http://<?php echo APP_HOST; ?>/user/validar" method="POST">
      <label>
        <span>Email</span>
        <input type="email" name="email" placeholder="Digite seu e-mail" required />
      </label>
      <label>
        <span>Sua Senha</span>
        <input type="password" name="password" placeholder="***************" required />
      </label>
      <button class="buttonSubmit" type="submit">Entrar na plataforma</button>
    </form>
    <a href="http://<?php echo htmlspecialchars(APP_HOST); ?>/user/cadastro">
      Não possui conta? Crie uma agora!
    </a>
    <a class="mt-2" href="http://<?php echo htmlspecialchars(APP_HOST); ?>/user/resetPassword">
      Esqueci minha senha
    </a>
  </div>
</div>
