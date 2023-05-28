<div class="container containerSolicitacao">
    <h1>Meus Posts</h1>
    <div class="cardContainer">
        <div class="flag aceito">
            <span>Aprovado</span>
        </div>
        <header>
            <strong>Titulo da Postagem</strong>
            <div class="detalhesPostInfo">
                <ul>
                    <li>
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                        <time>16/05/2023</time>
                    </li>
                    <li>
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                        16/05/2023
                    </li>
                </ul>
            </div>
        </header>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra pharetra lectus auctor sed.
        </p>


    </div>


    <div class="cardContainer">
        <div class="flag pendente">
            <span>Pendente</span>
        </div>
        <header>
            <strong>Titulo da Postagem</strong>
            <div class="detalhesPostInfo">
                <ul>
                    <li>
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                        16/05/2023
                    </li>
                    <li>
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                        16/05/2023
                    </li>
                </ul>
            </div>
        </header>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra pharetra lectus auctor sed.
        </p>


    </div>


    <div class="cardContainer" style="position: relative;">
        <div class="flag negado">
            <span>Negado</span>
        </div>
        <button class="position-absolute btn" style="right: 20px; top: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <img src="http://<?php echo APP_HOST; ?>/public/icons/warning.png" alt="visualizar justificativa de negação" />
        </button>
        <header>
            <strong>Titulo da Postagem</strong>
            <div class="detalhesPostInfo">
                <ul>
                    <li>
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                        16/05/2023
                    </li>
                    <li>
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                        16/05/2023
                    </li>
                </ul>
            </div>
        </header>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra pharetra lectus auctor sed.
        </p>


    </div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Justificativa</h1>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <img src="http://<?php echo APP_HOST; ?>/public/icons/x.png" alt="negar postagem" />
                </button>
            </div>
            <div class="modal-body" style="padding: 2rem;">
                <div class="d-flex gap-3">

                    <div>
                        <img src="http://<?php echo APP_HOST; ?>/public/icons/warning-big.png" alt="visualizar justificativa de negação" />
                    </div>
                    <div class="detalhesPostInfo">
                        <ul>
                            <li>
                                <img src="http://<?php echo APP_HOST; ?>/public/icons/calendar.png" alt="calendario" />
                                16/05/2023
                            </li>
                            <li>
                                <img src="http://<?php echo APP_HOST; ?>/public/icons/user.png" alt="user" />
                                16/05/2023
                            </li>
                        </ul>
                        <p style="margin-left: 2rem; text-align: justify; color: #D7D7D7; font-size: 14px; line-height: 2;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra pharetra lectus auctor sed.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nullam dolor sapien, vulputate eu diam at, condimentum hendrerit tellus. Nam facilisis sodales felis, pharetra pharetra lectus auctor sed.
                        </p>
                    </div>


                </div>

            </div>

            <div class="actions">
                <button type="button" class="negado" style="color: #FF57B2;" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>