<?php
include_once '../classes/Categoria.php';

if (isset($_POST['nome'])) {
    $cat = new Categoria();
    $cat->setNome($_POST['nome']);
    $resposta = $cat->verificarCampos();
    if ($resposta == "") {
        $ctrl_cat = new CtrlCategoria();
        $ctrl_cat->cadastrar($cat);
        echo "<script>alertify.alert('SUCESSO!','Categoria Cadastrada com Sucesso')</script>";

    }else{
        echo "<script>alertify.alert('ERRO!','".$resposta."')</script>";
    }
}
?>
