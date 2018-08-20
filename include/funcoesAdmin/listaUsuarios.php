<?php
$caminho_foto = "../upload/foto_perfil/";
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
            echo "<td><img src='" . $foto . "' style='width:50px; height:50px;'/></td>";
            echo "<td>" . $nomegrupo . "</td>";

            if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                echo "<td class='td-actions text-left'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='mx-1 btn btn-success btn-sm'><i class='btn-icon-only fa fa-edit'> </i></a>";
                echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='btn-deluser mx-1 btn btn-danger btn-sm'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
            } else {
                echo "<td class='text-left'>Nenhuma</td>";
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
            echo "<td><img src='" . $foto . "' style='width:50px; height:50px;'/></td>";
            echo "<td>" . $nomegrupo . "</td>";

            if (NIVELACESSO > $nivel_alvo_user || $_SESSION['idUsuario'] == $idUsuario) {
                echo "<td class='td-actions text-left'> <a href='home.php?acao=editar-usuario&id=$idUsuario' class='mx-1 btn btn-success btn-sm'><i class='btn-icon-only fa fa-edit'> </i></a>";
                echo "<a href='home.php?acao=ver-usuarios&delete=$idUsuario' class='btn-deluser mx-1 btn btn-danger btn-sm'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
            } else {
                echo "<td class='text-left'>Nenhuma</td>";
            }
            echo "</tr>";
        }
    }
} 
?>