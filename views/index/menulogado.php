<?php include_once 'include/funcoesUsuario/alterarfoto.php'; ?>
<form class="form-inline my-2 my-lg-0">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mx-2">
                    <img src="<?php
                    if (FOTOUSUARIO == "") {
                        echo $path_foto . "embranco.png";
                    } else {
                        echo $path_foto . FOTOUSUARIO;
                    }
                    ?>" style="width:50px; height: 50px;"/>
                </span><?php echo $_SESSION['login'] . "(" . NOMEGRUPO . ")"; ?></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                <a class="dropdown-item" data-toggle="modal" data-target="#alterarFotoModal" href="#">Alterar Foto</a>
                <?php
                if (NIVELACESSO >= 1) {
                    echo "<a class='dropdown-item' href='admin'>Acessar Painel</a>";
                    echo "<a class='dropdown-item' href='admin/home.php?acao=cad-postagem'>Adicionar Postagem</a>";
                }
                ?>
                <a class="dropdown-item" href="?sair">Sair</a>

            </div>
        </li>
    </ul>
</form>