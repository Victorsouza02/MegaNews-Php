<?php

// VERIFICAR NIVEL DO USUARIO 
if (NIVELACESSO >= 2) {
    if (isset($_GET['delete'])) {
        $id_selecionado = $_GET['delete'];
        $ctrl_usuario = new CtrlUsuario();
        $nivel_alvo = $ctrl_usuario->obterNiveldeAcesso($id_selecionado);

        if ($id_selecionado == $_SESSION['idUsuario']) {
            echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Quer deletar a si mesmo? AZIDEIA
            </div>';
        } else {
            // CONTROLE DE EXCLUSÃO
            if (NIVELACESSO <= $nivel_alvo) {
                echo "<script>";
                echo 'window.location.href = "home.php?acao=ver-usuarios";';
                echo "</script>";
                exit;
            } else {
                $usuario_ctrl_del = new CtrlUsuario();
                $resposta_del = $usuario_ctrl_del->deletar($id_selecionado);
                if ($resposta_del) {
                    echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!</strong> Usuário deletado com sucesso
            </div>';
                } else {
                    echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Falha ao deletar usuário
            </div>';
                }
            }
        }
    }
} else {
    echo "<script>";
    echo 'window.location.href = "home.php?acao=ver-usuarios";';
    echo "</script>";
    exit;
}
?>