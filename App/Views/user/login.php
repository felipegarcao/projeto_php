<div class="loginContainer">
    <div class="loginWrapper">
      <div class="loginHeader">
      <img src="http://<?php echo APP_HOST; ?>/public/icons/logo.png" alt="Logo" />
      
        <p>Faça Login e comece a usar!</p>
      </div>
      <form action="http://<?php echo APP_HOST; ?>/home/index">


        <label>
          <span>Email</span>
          <input type="email" placeholder="Digite seu e-mail" />
        </label>

        <label>
          <span>Sua Senha</span>
          <input type="password" placeholder="***************" />
        </label>

        <button class="buttonSubmit">Entrar na plataforma</button>
      </form>
      <a href="http://<?php echo APP_HOST; ?>/user/cadastro">
        Não possui conta? Cria uma agora!
      </a>
    </div>
  </div>

