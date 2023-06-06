<?php if($Sessao::retornaErro()){ ?>
    <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
    </div>
<?php } ?>  
<div class="loginContainer" style="flex-direction: column; margin-top: 2rem; height: calc(100vh - 230px)">
    <h2>Resetar senha</h2>
    <div class="containerCadastroPost" style="padding: 2rem">
        <form action="http://<?php echo APP_HOST; ?>/user/resetPassword" method="post" id="form_cadastro">
            <label>
                <span>
                    Usuario:
                </span>
                <input type="text" disabled placeholder="" id="nome" name="nome" value="<?php echo $viewVar['user']->getName(); ?>"/>
            </label>

            <label>
                <span>
                    Nova Senha:
                </span>
                <input type="password" placeholder="Digite sua nova senha" name="password"/>
            </label>


            <label>
                <span>
                    Confirmação da Nova Senha:
                </span>
                <input type="password" placeholder="Digite novamente sua senha" name="password_confirm" />
            </label>


            <button type="submit" class="buttonSubmit">Atualizar</button>
        </form>
    </div>
</div>