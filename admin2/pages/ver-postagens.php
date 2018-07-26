<?php
$caminho_foto = "../upload/postagens/";


?>
<section style="margin-top:5%;">
    <div class="container">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-data3">
                <thead>
                <h3 class="text-center my-3">Postagens</h3>
                <?php include_once "../include/funcoesAdmin/deletarPostagem.php"?>
                <a href="home.php?acao=cad-postagem" class="ml-2"><button type="button" class="btn btn-success my-2">Nova Postagem</button></a>
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
                                echo "<td> <img src='" . $caminho_foto . $lista[$i]['foto'] . "' style='width:90px; height:50px' /></td>";
                                echo "<td class='td-actions'> <a href='home.php?acao=editar-postagem&id=$idPostagem' class='btn btn-small btn-success' style='display:inline;'><i class='btn-icon-only icon-edit'> </i></a>";
                                echo "<a href='home.php?acao=ver-postagens&delete=$idPostagem' class='btn btn-danger btn-small' style='display:inline;'><i class='btn-icon-only icon-remove'> </i></a></td>";
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
                                echo "<td> <img src='" . $caminho_foto . $lista[$i]['foto'] . "' style='width:90px; height:50px' /></td>";
                                echo "<td class='td-actions'> <a href='home.php?acao=editar-postagem&id=$idPostagem' class='btn btn-small btn-success' style='display:inline;'><i class='btn-icon-only icon-edit'> </i></a>";
                                echo "<a href='home.php?acao=ver-postagens&delete=$idPostagem' class='btn btn-danger btn-small' style='display:inline;'><i class='btn-icon-only icon-remove'> </i></a></td>";
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
                            echo "<td class='text-left'> <a href='home.php?acao=editar-postagem&id=$idPostagem' class='px-1' style='display:inline;'><i class='btn-icon-only fa fa-edit'> </i></a>";
                            echo "<a href='home.php?acao=ver-postagens&delete=$idPostagem' class='px-1' style='display:inline;'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</section>
