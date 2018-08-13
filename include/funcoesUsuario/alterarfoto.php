<?php

$path_foto = "upload/foto_perfil/";
if (isset($_POST['alterarfoto'])) {
    $foto = $_FILES['nova_foto'];
    $user = new Usuario();
    $resposta_foto = $user->validarFoto($foto);

    if ($resposta_foto == "") {
    
        if (FOTOUSUARIO != "") {
            unlink($path_foto.FOTOUSUARIO);
        }
        
        $user->setCodUsuario($_SESSION['idUsuario']);
        $user_ctrl = new CtrlUsuario();
        $user_ctrl->editarFoto($user);
        
        echo '<script>window.location.href = "index.php";</script>';
    } else {
        echo "<script>alertify.alert('ERRO AO ALTERAR FOTO','$resposta_foto');</script>";
    }
}
?>