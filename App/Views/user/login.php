<div class="loginContainer">
  <div class="loginWrapper">
    <div class="loginHeader">
      <img src="http://<?php echo htmlspecialchars(APP_HOST); ?>/public/icons/logo.png" alt="Logo" />
      <p>Faça Login e comece a usar!</p>
    </div>
    <form action="http://<?php echo htmlspecialchars(APP_HOST); ?>/home" method="POST">
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
    <?php if (isset($_SESSION['erro'])): ?>
      <p class="error"><?php echo htmlspecialchars($_SESSION['erro']); ?></p>
    <?php endif; ?>
  </div>
</div>
