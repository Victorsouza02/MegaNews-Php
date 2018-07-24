<?php
// VERIFICAR NIVEL DE ACESSO
if (!(NIVELACESSO >= 2)) {
    echo "<script>window.location.href= 'home.php' </script>";
    exit;
}
$caminho_foto = "../upload/foto_perfil/";
include_once '../include/funcoesAdmin/deletarUsuario.php';
?>


<form method="POST">
    <label>Procurar usuário</label>
    <input type="text" name="inputbusca" placeholder="Digite o nome" style="margin-bottom: 0px!important">
    <input type="submit" name="botaobusca" class="btn btn-success" value="Buscar">
</form>
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Usuários</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Nome </th>
                    <th scope="col"> Login</th>
                    <th scope="col"> Senha</th>
                    <th scope="col"> Foto </th>
                    <th scope="col"> Grupo</th>
                    <th class="td-actions">Ações </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ctrl_listar = new CtrlUsuario();

                if (isset($_POST['botaobusca'])) {

                    if ($_POST['inputbusca'] == "") {
                        $lista = $ctrl_listar->listarUsuarios();
                        $ctgrupo = new CtrlGrupo();
                        foreach ($lista as $i => $value) {
                            $nivel_alvo_user = $ctgrupo->obterNivelDeAcesso($lista[$i]['idGrupo']);
                            $nomegrupo = $ctgrupo->nomeGrupoById($lista[$i]['idGrupo']);
                            if ($lista[$i]['foto'] == "") {
                                $foto = $caminho_foto . "embranco.png";
                            } else {
                                $foto = $caminho_foto . $lista[$i]['foto'];
                            }
                            $idUsuario = $lista[$i]['idUsuario'];
                            echo "<tr>";
                            echo "<th scope='row'>$idUsuario</th>";
                            echo "<td>" . $lista[$i]['nome'] . "</td>";
                            echo "<td>" . $lista[$i]['login'] . "</td>";
                            if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                                echo "<td>" . $lista[$i]['senha'] . "</td>";
                            } else {
                                echo "<td>Não Disponível</td>";
                            }
                            echo "<td><img src='" . $foto . "' style='width:50px; height:50px;'/></td>";
                            echo "<td>" . $nomegrupo . "</td>";

                            if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                                echo "<td class='td-actions'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='btn btn-small btn-success'><i class='btn-icon-only icon-edit'> </i></a>";
                                echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'> </i></a></td>";
                            } else {
                                echo "<td>Nenhuma</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        $lista = $ctrl_listar->buscar($_POST['inputbusca']);
                        $ctgrupo = new CtrlGrupo();
                        foreach ($lista as $i => $value) {
                            $nivel_alvo_user = $ctgrupo->obterNivelDeAcesso($lista[$i]['idGrupo']);
                            $nomegrupo = $ctgrupo->nomeGrupoById($lista[$i]['idGrupo']);
                            if ($lista[$i]['foto'] == "") {
                                $foto = $caminho_foto . "embranco.png";
                            } else {
                                $foto = $caminho_foto . $lista[$i]['foto'];
                            }
                            $idUsuario = $lista[$i]['idUsuario'];
                            echo "<tr>";
                            echo "<th scope='row'>$idUsuario</th>";
                            echo "<td>" . $lista[$i]['nome'] . "</td>";
                            echo "<td>" . $lista[$i]['login'] . "</td>";
                            if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                                echo "<td>" . $lista[$i]['senha'] . "</td>";
                            } else {
                                echo "<td>Não Disponível</td>";
                            }

                            echo "<td><img src='" . $foto . "' style='width:50px; height:50px;'/></td>";
                            echo "<td>" . $nomegrupo . "</td>";

                            if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                                echo "<td class='td-actions'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='btn btn-small btn-success'><i class='btn-icon-only icon-edit'> </i></a>";
                                echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'> </i></a></td>";
                            } else {
                                echo "<td>Nenhuma</td>";
                            }
                            echo "</tr>";
                        }
                    }
                } else {
                    $lista = $ctrl_listar->listarUsuarios();
                    $ctgrupo = new CtrlGrupo();
                    foreach ($lista as $i => $value) {
                        $nivel_alvo_user = $ctgrupo->obterNivelDeAcesso($lista[$i]['idGrupo']);
                        $nomegrupo = $ctgrupo->nomeGrupoById($lista[$i]['idGrupo']);
                        if ($lista[$i]['foto'] == "") {
                            $foto = $caminho_foto . "embranco.png";
                        } else {
                            $foto = $caminho_foto . $lista[$i]['foto'];
                        }
                        $idUsuario = $lista[$i]['idUsuario'];
                        echo "<tr>";
                        echo "<th scope='row'>$idUsuario</th>";
                        echo "<td>" . $lista[$i]['nome'] . "</td>";
                        echo "<td>" . $lista[$i]['login'] . "</td>";
                        if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                            echo "<td>" . $lista[$i]['senha'] . "</td>";
                        } else {
                            echo "<td>Não Disponível</td>";
                        }

                        echo "<td><img src='" . $foto . "' style='width:50px; height:50px;'/></td>";
                        echo "<td>" . $nomegrupo . "</td>";

                        if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                            echo "<td class='td-actions'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='btn btn-small btn-success'><i class='btn-icon-only icon-edit'> </i></a>";
                            echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'> </i></a></td>";
                        } else {
                            echo "<td>Nenhuma</td>";
                        }
                        echo "</tr>";
                    }
                }

                if (isset($_GET['delete'])) {
                    echo "<script>";
                    echo 'setTimeout(function(){ window.location.href = "home.php?acao=ver-usuarios"; }, 2000);';
                    echo "</script>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


