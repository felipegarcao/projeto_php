<div class="loginContainer">
    <div class="loginWrapper">
        <div class="loginHeader">
            <img src="http://<?php echo APP_HOST; ?>/public/icons/logo.png" alt="Logo" />
            <p>Faça o Registro e comece a usar!</p>
        </div>
        <form action="http://<?php echo APP_HOST; ?>/user/salvar" method="post" id="form_cadastro">
            <label>
                <span>Nome Completo</span>
                <input type="text" name="name" placeholder="Digite o seu Nome" value="<?php echo $Sessao::retornaValorFormulario('name'); ?>" required>
            </label>

            <label>
                <span>Email</span>
                <input type="email" name="email" placeholder="Digite seu e-mail" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
            </label>

            <label>
                <span>Sua Senha</span>
                <input type="password" name="password" placeholder="***************" value="<?php echo $Sessao::retornaValorFormulario('password'); ?>" required>
            </label>

            <button class="buttonSubmit" type="submit">Registrar Usuário</button>
        </form>

        <a href="http://<?php echo APP_HOST; ?>/">Já possui conta? Faça Login</a>
    </div>
</div>
