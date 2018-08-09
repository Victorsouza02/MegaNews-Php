<?php include_once 'include/funcoesUsuario/alterarfoto.php'; ?>

<li class="nav-item dropdown my-auto">
    <form class="form-inline">
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
    </form>
</li>