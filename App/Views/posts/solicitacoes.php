<div class="container containerSolicitacao">
  <h1>Solicitações</h1>
  <div class="cardContainer">
    <header>
      <h3>Titulo da Postagem</h3>
      <div class="detalhesPostInfo">
        <ul>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />

            16/05/2023
          </li>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
            Luis Felipe Garção Silva
          </li>
        </ul>
      </div>
    </header>

    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra
      pharetra lectus auctor sed.
    </p>

    <div class="actions">
      <button class="aceito">
        <img src="http://<?php echo APP_HOST; ?>/public/icons/confirm.png" alt="confirmar postagem" />
      </button>
      <button class="negado" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
      </button>
    </div>
  </div>

  <div class="cardContainer">
    <header>
      <h3>Titulo da Postagem</h3>
      <div class="detalhesPostInfo">
        <ul>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />

            16/05/2023
          </li>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
            Luis Felipe Garção Silva
          </li>
        </ul>
      </div>
    </header>

    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra
      pharetra lectus auctor sed.
    </p>

    <div class="actions">
      <button class="aceito">
        <img src="http://<?php echo APP_HOST; ?>/public/icons/confirm.png" alt="confirmar postagem" />
      </button>
      <button class="negado" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
      </button>
    </div>
  </div>


  <div class="cardContainer">
    <header>
      <h3>Titulo da Postagem</h3>
      <div class="detalhesPostInfo">
        <ul>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />

            16/05/2023
          </li>
          <li>
            <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
            Luis Felipe Garção Silva
          </li>
        </ul>
      </div>
    </header>

    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra
      pharetra lectus auctor sed.
    </p>

    <div class="actions">
      <button class="aceito">
        <img src="http://<?php echo APP_HOST; ?>/public/icons/confirm.png" alt="confirmar postagem" />
      </button>
      <button class="negado" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
      </button>
    </div>
  </div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Justificativa</h1>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
        </button>
      </div>
      <div class="modal-body">
        <form>
          <textarea rows="9"></textarea>
        </form>
      </div>
      <div class="actions">
        <button type="button" class="negado" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="aceito">Finalizar</button>
      </div>
    </div>
  </div>
</div>