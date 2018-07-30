<?php

if (isset($_POST['botao'])) {
    include_once '../classes/Sessao.php';
    include_once '../classes/Usuario.php';

    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['pws']);

    $user_login = new Usuario();
    $user_login->setLogin($login);
    $user_login->setSenha($senha);
    $erros_login_admin = $user_login->verificarLogin();

    if ($erros_login_admin == "") {
        $usuario_ctrl = new CtrlUsuario();
        $user = $usuario_ctrl->login($user_login);

        if ($user == true) {
            $sessao = new Sessao();
            $idUser = $usuario_ctrl->obterIdUsuario($user_login->getLogin());
            $sessao->setUsuario($user_login->getLogin());
            $sessao->setIdUsuario($idUser);
            $sessao->abrirSessao();

            include_once '../include/constantes.php';

            echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!</strong> Login feito com sucesso
            </div>';
            echo "<script>window.location.href= 'home.php'</script>";
        } else if (!(NIVELACESSO >= 1)) {
            echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Usuário sem permissão;
            </div>';
        } else {
            echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Usuário não encontrado
            </div>';
        }
    } else {
        echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> ' . $erros_login_admin . '
            </div>';
    }
}
?>

