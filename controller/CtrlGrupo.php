<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/DAO/GrupoDao.php";

class CtrlGrupo {

    public function listarGrupos() {
        $dao = new GrupoDao();
        $array_grupo = $dao->listarGrupos();

        foreach ($array_grupo as $i => $value) {
            $idGrupo = $array_grupo[$i]['idGrupo'];
            $nomeGrupo = $array_grupo[$i]['nome'];
            echo "<option value='$idGrupo'>";
            echo "$nomeGrupo";
            echo "</option>";
        }
    }

    public function listarGruposByNivel($nivel) {
        $dao = new GrupoDao();
        $array_grupo = $dao->listarGrupos();

        foreach ($array_grupo as $i => $value) {
            if ($array_grupo[$i]['nivel'] < $nivel) {
                $idGrupo = $array_grupo[$i]['idGrupo'];
                $nomeGrupo = $array_grupo[$i]['nome'];
                echo "<option value='$idGrupo'>";
                echo "$nomeGrupo";
                echo "</option>";
            }
        }
    }

    public function listarGruposEdit($id, $nivel) {
        $dao = new GrupoDao();
        $array_grupo = $dao->listarGrupos();
        include_once 'CtrlUsuario.php';
        $usercontrol = new CtrlUsuario();
        $dados = $usercontrol->dadosUsuarioById($id);
        foreach ($array_grupo as $i => $value) {
            if ($array_grupo[$i]['nivel'] < $nivel) {
                $idGrupo = $array_grupo[$i]['idGrupo'];
                $nomeGrupo = $array_grupo[$i]['nome'];

                if ($dados['idGrupo'] == $array_grupo[$i]['idGrupo']) {
                    echo "<option value='$idGrupo' selected>";
                    echo "$nomeGrupo";
                    echo "</option>";
                } else {
                    echo "<option value='$idGrupo'>";
                    echo "$nomeGrupo";
                    echo "</option>";
                }
            }
        }
    }

    public function nomeGrupoById($id) {
        $dao = new GrupoDao();
        $array_grupos = $dao->listarGrupos();

        foreach ($array_grupos as $i => $value) {
            if ($array_grupos[$i]['idGrupo'] == $id) {
                $nome_grupo = $array_grupos[$i]['nome'];
            }
        }

        return $nome_grupo;
    }

    public function obterNivelDeAcesso($idGrupo) {
        $dao = new GrupoDao();
        $res = $dao->obterNivelDeAcesso($idGrupo);
        return $res['nivel'];
    }

}
?>

