<?php

$path_foto = "/upload/foto_perfil/";
if (isset($_POST['alterarfoto'])) {
    $foto = $_FILES['nova_foto'];
    $user = new Usuario();
    $resposta_foto = $user->validarFoto($foto);

    if ($resposta_foto == "") {
        echo "<script> alert('oi'); </script>";
        if (FOTOUSUARIO == "") {
            unlink($path_foto . FOTOUSUARIO);
        }
        $user->setCodUsuario($_SESSION['idUsuario']);
        $user_ctrl = new CtrlUsuario();
        $user_ctrl->editarFoto($user);
    } else {
        echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> <br>
            '.$resposta_foto.'
            </div>';
    }
}
?>