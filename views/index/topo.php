
<!-- TOPO -->
<nav class="navbar navbar-expand-lg bg-nav">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <span>
                <img class='logo' src="upload/logo/logo.png" alt="Logo">
            </span>
        </a>
        <button class="navbar-toggler custom-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-3" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <?php
                        $ctrl_cat = new CtrlCategoria();
                        $dados_cat = $ctrl_cat->listarCategorias();

                        foreach ($dados_cat as $key => $value) {
                            echo "<a class='dropdown-item' href='index.php?cat=" . $dados_cat[$key]['idCategoria'] . "'>" . $dados_cat[$key]['nome'] . "</a>";
                        }
                        ?>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto my-auto mt-lg-0">
                <li class="my-auto">
                    <form id="busca" method="get">
                        <div class="container1">
                            <input type="text" class="input" name="busca" placeholder="Pesquisar">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </form>
                </li>
                <?php
                if (isset($_SESSION['login'])) {
                    include_once 'views/index/menulogado.php';
                } else {
                    include_once 'views/index/menupadrao.php';
                }
                ?>
            </ul>    
        </div>
    </div>
</nav>

<!-- Modal ENTRAR USUARIO -->
<form id="ajax-register-form" method="post" role="form" autocomplete="off">
    <div class="modal fade" id="entrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <input class="form-control" type="text" name="login">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input class="form-control" type="password" name="pws">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="botao" value="Entrar">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal CADASTRO USUARIO -->
<form id="ajax-register-form" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuários</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" id="username" tabindex="1" class="form-control" placeholder="Nome" value="">
                    </div>
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" name="login" id="email" tabindex="1" class="form-control" placeholder="Usuario" value="">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="pws" id="password" tabindex="2" class="form-control" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label>Confirmar Senha</label>
                        <input type="password" name="confpws" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar Senha">
                    </div>

                    <div class="form-group">											
                        <label class="mr-3">Foto de Perfil(Opcional até 400x400)</label>
                        <input type="file" multiple class="span6 fileinput" id="imagem" name="fotousuario">				
                    </div> <!-- /control-group -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="botaoregistrar" value="Registrar">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal ALTERAR FOTO -->
<form id="ajax-register-form" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
    <div class="modal fade" id="alterarFotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Foto de Perfil</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mr-3">Foto Atual</label>
                        <img src="<?php
                        if (FOTOUSUARIO == "") {
                            echo $path_foto . "embranco.png";
                        } else {
                            echo $path_foto . FOTOUSUARIO;
                        }
                        ?>" style="width: 90px; height: 90px;"/>
                    </div>

                    <div class="form-group">											
                        <label class="mr-3">Nova Foto</label>
                        <input type="file" multiple class="span6 fileinput" id="imagem" name="nova_foto">				
                    </div> <!-- /control-group -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="alterarfoto" value="Alterar">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- FIM TOPO-->