<?php

$ctrledit = new CtrlUsuario();
$dadosedit = $ctrledit->dadosUsuarioById($_GET['id']);
$loginedit = $dadosedit['login'];
$senhaedit = $dadosedit['senha'];
$nomeedit = $dadosedit['nome'];
$grupoedit = $dadosedit['idGrupo'];


$nivel_alvo = $ctrledit->obterNiveldeAcesso($_GET['id']);
if (NIVELACESSO > $nivel_alvo || $_GET['id'] == $_SESSION['idUsuario']) { // SE O NIVEL DO USUARIO FOR MAIOR QUE O NIVEL DO ALVO DA AÇÃO OU O USUARIO FOR IGUAL AO ALVO
    if (isset($_POST['botaoeditar'])) {
        include_once '../classes/Usuario.php';
        $usuario_edit = new Usuario();
        $usuario_edit->setCodUsuario($_GET['id']);
        $usuario_edit->setNome($_POST['edit_nome']);
        $usuario_edit->setLogin($_POST['edit_login']);
        $usuario_edit->setSenha($_POST['edit_pws']);
        if (!($_GET['id'] == $_SESSION['idUsuario'])) {
            $usuario_edit->setIdGrupo($_POST['editgrupo']);
        } else {
            $usuario_edit->setIdGrupo($grupoedit);
        }
        $dados_user = new CtrlUsuario();
        $resposta = $usuario_edit->verificarEdicao($dadosedit);

        if ($resposta) { // SE A VERIFICAÇÃO DE EDIÇÃO PASSAR
            $resp_edit = $dados_user->editar($usuario_edit);
            if ($resp_edit) { // SE A EDIÇÃO FOI FEITA COM SUCESSO
                echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!</strong> Usuário editado com sucesso
            </div>';
                echo "<script>";
                echo 'setTimeout(function(){ window.location.href = "home.php?acao=ver-usuarios"; }, 2000);';
                echo "</script>";
            } else { // SE HOUVE ERRO NA EDIÇÃO
                echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Falha ao editar usuário
            </div>';
            }
        } else { // SE HOUVER ERROS NA VERIFICAÇÃO DE EDIÇÃO
            echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Falha ao editar usuário
            </div>';
        }
    }
} else { // SE O NIVEL DO USUARIO FOR MENOR QUE O NIVEL DO ALVO DA AÇÃO
    echo "<script>";
    echo 'window.location.href = "home.php?acao=ver-usuarios";'; // VOLTA PARA O MENU DE VER USUARIOS
    echo "</script>";
    exit;
}
?>