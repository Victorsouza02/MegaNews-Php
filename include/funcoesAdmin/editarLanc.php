<?php
if (isset($_POST['editlanc'])) {
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $id = $_POST['idlanc'];
    
    // VERIFICAÇÃO
    $erros = "";
    if ($titulo == "") {
        $erros .= "Campo TITULO está em branco.<br>";
    }
    if ($data == "") {
        $erros .= "Campo DATA está em branco.<br>";
    }

    if ($erros == "") {
        $ctrl = new CtrlPostagem();
        $ctrl->editarLancamento($titulo, $data, $id);
        echo "<script>alertify.alert('Editado com sucesso')</script>";
    } else {
        echo "<script>alertify.alert('$erros')</script>";
    }
}
?>