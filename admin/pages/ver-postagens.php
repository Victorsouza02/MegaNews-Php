<?php
$caminho_foto = "../upload/postagens/";
?>
<section style="margin-top:5%;">
    <div class="container">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-data3">
                <thead>
                <h3 class="text-center my-3">Postagens</h3>
                <?php include_once "../include/funcoesAdmin/deletarPostagem.php" ?>
                <a href="home.php?acao=cad-postagem" class="ml-2"><button type="button" class="btn btn-success my-2">Nova Postagem</button></a>
                <a href="#" data-toggle="modal" data-target="#cadcategoria"class="ml-2"><button type="button" class="btn btn-success my-2">Nova Categoria</button></a>
                <a href="#" data-toggle="modal" data-target="#delcategoria"class="ml-2"><button type="button" class="btn btn-danger my-2">Deletar Categoria</button></a>
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-6 ml-2">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="botaobusca">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                </div>
                                <input type="text" id="input1-group2" name="inputbusca" placeholder="Titulo" class="form-control">
                            </div>
                        </div>
                    </div>
                </form> 
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Autor</th>
                    <th>Exibir</th>
                    <th>Foto</th>
                    <th class="text-left">Ação</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['botaobusca'])) {

                        if ($_POST['inputbusca'] == "") {
                            $ctrl_postagem = new CtrlPostagem();
                            $lista = $ctrl_postagem->listarPostagens();
                            $ctuser = new CtrlUsuario();
                            foreach ($lista as $i => $value) {
                                $idAutor = $lista[$i]['idUsuario'];
                                $nomeAutor = $ctuser->dadosUsuarioById($idAutor);
                                $idPostagem = $lista[$i]['idPostagem'];
                                echo "<tr>";
                                echo "<th scope='row'>$idPostagem</th>";
                                echo "<td>" . $lista[$i]['titulo'] . "</td>";
                                echo "<td>" . $lista[$i]['descricao'] . "</td>";
                                echo "<td>" . $nomeAutor['login'] . "</td>";
                                echo "<td>" . $lista[$i]['exibir'] . "</td>";
                                echo "<td> <img src='" . $caminho_foto . $lista[$i]['foto'] . "' style='min-width:100px; min-height:70px; max-width:130px;' /></td>";
                                echo "<td class='td-actions'> <a href='home.php?acao=editar-postagem&id=$idPostagem' class='mx-1 btn btn-success btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-edit'> </i></a>";
                                echo "<a  id='btn-delpost' href='home.php?acao=ver-postagens&delete=$idPostagem' class='mx-1 btn btn-danger btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
                                echo "</tr>";
                            }
                        } else {
                            $ctrl_postagem = new CtrlPostagem();
                            $lista = $ctrl_postagem->buscar($_POST['inputbusca']);
                            $ctuser = new CtrlUsuario();
                            foreach ($lista as $i => $value) {
                                $idAutor = $lista[$i]['idUsuario'];
                                $nomeAutor = $ctuser->dadosUsuarioById($idAutor);
                                $idPostagem = $lista[$i]['idPostagem'];
                                echo "<tr>";
                                echo "<th scope='row'>$idPostagem</th>";
                                echo "<td>" . $lista[$i]['titulo'] . "</td>";
                                echo "<td>" . $lista[$i]['descricao'] . "</td>";
                                echo "<td>" . $nomeAutor['login'] . "</td>";
                                echo "<td>" . $lista[$i]['exibir'] . "</td>";
                                echo "<td> <img src='" . $caminho_foto . $lista[$i]['foto'] . "' style='min-width:100px; min-height:70px; max-width:130px;' /></td>";
                                echo "<td class='td-actions'> <a href='home.php?acao=editar-postagem&id=$idPostagem' class='mx-1 btn btn-success btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-edit'> </i></a>";
                                echo "<a id='btn-delpost' href='home.php?acao=ver-postagens&delete=$idPostagem' class='mx-1 btn btn-danger btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        $ctrl_postagem = new CtrlPostagem();
                        $lista = $ctrl_postagem->listarPostagens();
                        $ctuser = new CtrlUsuario();
                        foreach ($lista as $i => $value) {
                            $idAutor = $lista[$i]['idUsuario'];
                            $nomeAutor = $ctuser->dadosUsuarioById($idAutor);
                            $idPostagem = $lista[$i]['idPostagem'];
                            echo "<tr>";
                            echo "<td>$idPostagem</td>";
                            echo "<td>" . $lista[$i]['titulo'] . "</td>";
                            echo "<td>" . $lista[$i]['descricao'] . "</td>";
                            echo "<td>" . $nomeAutor['login'] . "</td>";
                            echo "<td>" . $lista[$i]['exibir'] . "</td>";
                            echo "<td> <img src='" . $caminho_foto . $lista[$i]['foto'] . "' style='min-width:100px; min-height:70px; max-width:130px;' /></td>";
                            echo "<td class='text-left'> <a  href='home.php?acao=editar-postagem&id=$idPostagem' class='mx-1 btn btn-success btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-edit'> </i></a>";
                            echo "<a id='btn-delpost' href='home.php?acao=ver-postagens&delete=$idPostagem' class='mx-1 btn btn-danger btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>       
    </div>

    <!-- Modal CADASTRAR CATEGORIA -->
    <form id="form-cadcat" method="post" role="form" autocomplete="off">
        <div class="modal fade" id="cadcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Criar Categoria</h5>
                        <?php include_once "../include/funcoesAdmin/cadastrarCategoria.php"; ?>                      
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nome da Categoria</label>
                            <input class="form-control" type="text" name="nome">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btn-cadcat" name="botaocriar" > Criar </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal DELETAR CATEGORIA -->
    <form id="form-delcat" method="post" role="form" autocomplete="off">
        <div class="modal fade" id="delcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Categoria</h5>
                        <?php include_once "../include/funcoesAdmin/deletarCategoria.php"; ?>  
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="selectSm" class=" form-control-label">Categoria</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="categoria" id="SelectLm" class="form-control-sm form-control">
                                    <?php
                                    $ctrl_cat = new CtrlCategoria();
                                    $dados_cat = $ctrl_cat->listarCategorias();

                                    foreach ($dados_cat as $key => $value) {
                                        echo "<option value='" . $dados_cat[$key]['idCategoria'] . "'>" . $dados_cat[$key]['nome'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btn-delcat" name="botaodelcat" > Deletar </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>


