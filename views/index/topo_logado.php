<?php
    $path_foto_perfil = "upload/foto_perfil/";
    include_once 'include/alterarfoto.php';
?>

<!-- TOPO -->
 <nav class="navbar navbar-expand-lg  bg-nav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><span><img  class='logo' src="upload/logo/logo.png" alt="Logo"></span></a>
            <button class="navbar-toggler custom-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-3" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link scrollSuave" href="index.php">Inicio
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
                                    echo "<a class='dropdown-item' href='index.php?cat=".$dados_cat[$key]['idCategoria']."'>".$dados_cat[$key]['nome']."</a>";
                                }
                            ?>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mx-2">
                                <img src="<?php  if (FOTOUSUARIO == "") {echo $path_foto_perfil."embranco.png";} else {echo $path_foto_perfil.FOTOUSUARIO;} ?>" style="width:50px; height: 50px;"/>
                            </span><?php echo $_SESSION['login'] . "(" . NOMEGRUPO . ")"; ?></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                            <a class="dropdown-item" data-toggle="modal" data-target="#alterarFotoModal" href="#">Alterar Foto</a>
                        <?php
                            
                        if (NIVELACESSO >= 1) {
                             echo "<a class='dropdown-item' href='admin2'>Acessar Painel</a>";
                             echo "<a class='dropdown-item' href='admin2/home.php?acao=cad-postagem'>Adicionar Postagem</a>";
                        }
                    ?>
                            <a class="dropdown-item" href="?sair">Sair</a>

                        </div>
                    </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
 <!-- FIM TOPO-->
 
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
                        <img src="<?php  if (FOTOUSUARIO == "") {echo $path_foto_perfil."embranco.png";} else {echo $path_foto_perfil.FOTOUSUARIO;} ?>" style="width: 90px; height: 90px;"/>
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