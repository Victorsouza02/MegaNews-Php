<?php
// VERIFICAR NIVEL DE ACESSO
if (!(NIVELACESSO >= 2)) {
    echo "<script>window.location.href= 'home.php' </script>";
    exit;
}
$caminho_foto = "../upload/foto_perfil/";
?>

<section style="margin-top:5%;">
    <div class="container">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-data3">
                <thead>
                <h3 class="text-center my-3">Usuários</h3>
                <?php include_once '../include/funcoesAdmin/deletarUsuario.php';?>
                <a href="home.php?acao=cad-usuario" class="ml-2"><button type="button" class="btn btn-success my-2">Novo Usuário</button></a>
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-6 ml-2">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="botaobusca">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                </div>
                                <input type="text" id="input1-group2" name="inputbusca" placeholder="Login" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>   
                    <tr>
                        <th> # </th>
                        <th> Nome </th>
                        <th> Login</th>
                        <th> Senha</th>
                        <th> Foto </th>
                        <th> Grupo</th>
                        <th class="text-left"> Ações </th>
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
                                    echo "<th>$idUsuario</th>";
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
                                        echo "<td class='td-actions'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='mx-1 btn btn-success btn-sm'><i class='btn-icon-only fa fa-edit'> </i></a>";
                                        echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='mx-1 btn btn-danger btn-sm'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
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
                                    echo "<th>$idUsuario</th>";
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
                                        echo "<td class='td-actions'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='mx-1 btn btn-success btn-sm'><i class='btn-icon-only fa fa-edit'> </i></a>";
                                        echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='mx-1 btn btn-danger btn-sm'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
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
                                echo "<th>$idUsuario</th>";
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
                                    echo "<td class='td-actions'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='mx-1 btn btn-success btn-sm'><i class='btn-icon-only fa fa-edit'> </i></a>";
                                    echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='mx-1 btn btn-danger btn-sm'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
                                } else {
                                    echo "<td>Nenhuma</td>";
                                }
                                echo "</tr>";
                            }
                        }
                        ?>

                    </tbody>
            </table>
        </div>
    </div>
</section>
