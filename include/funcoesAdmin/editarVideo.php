<?php

if (isset($_POST['editvideo'])) {
    $titulo = $_POST['titulo'];
    $url = str_replace("watch?v=", "embed/",  $_POST['url']);
    $id = $_POST['idvideo'];

    // VERIFICAÇÃO
    $erros = "";
    if ($titulo == "") {
        $erros .= "Campo TITULO está em branco.<br>";
    }
    if ($url == "") {
        $erros .= "Campo URL está em branco.<br>";
    }

    if ($erros == "") {
        $ctrl = new CtrlPostagem();
        $ctrl->editarVideo($titulo, $url, $id);
        echo "<script>alertify.alert('Editado com sucesso')</script>";
    } else {
        echo "<script>alertify.alert('$erros')</script>";
    }
}
?>

