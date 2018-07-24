<?php

if (isset($_POST['botao'])) {
    include_once 'classes/Sessao.php';
    include_once 'classes/Usuario.php';

    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['pws']);

    $user_login = new Usuario();
    $user_login->setLogin($login);
    $user_login->setSenha($senha);

    $erros_login = $user_login->verificarLogin();

    if ($erros_login == "") {
        $usuario_ctrl = new CtrlUsuario();
        $user = $usuario_ctrl->login($user_login);

        if ($user == true) {
            $sessao = new Sessao();
            $idUser = $usuario_ctrl->obterIdUsuario($user_login->getLogin());
            $sessao->setUsuario($user_login->getLogin());
            $sessao->setIdUsuario($idUser);
            $sessao->abrirSessao();
            
            include_once 'include/constantes.php';

            echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!</strong> Login feito com sucesso
            </div>';
            echo "<script>";
            echo 'setTimeout(function(){ window.location.href = "index.php"; }, 2000);';
            echo "</script>";
        } else {
            echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Falha no login
            </div>';
        }
    } else {
        echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> ' . $erros_login . '
            </div>';
    }
}
?>