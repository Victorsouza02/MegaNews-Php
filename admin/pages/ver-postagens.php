<?php
$caminho_foto = "../upload/postagens/";
?>
<form method="POST">
    <label>Procurar postagem</label>
    <input type="text" name="inputbusca" placeholder="Digite o titulo" style="margin-bottom: 0px!important">
    <input type="submit" name="botaobusca" class="btn btn-success" value="Buscar">
</form>

<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Postagens</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Titulo </th>
                    <th scope="col"> Descricao</th>
                    <th scope="col"> Autor</th>
                    <th scope="col"> Exibir</th>
                    <th scope="col"> Foto </th>
                    <th class="td-actions">Ações </th>
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
                    ?>
            </tbody>
        </table>
    </div>
</div>