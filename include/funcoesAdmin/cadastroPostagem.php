<?php

if (isset($_POST['cadastrar'])) {
    include_once '../classes/Postagem.php';
    $allowedTags = '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
    $allowedTags .= '<li><ol><ul><span><div><br><ins><del>';
    $post = new Postagem();
    $post->setTitulo(trim(strip_tags($_POST['titulo'])));
    $post->setData(date("Y-m-d"));
    $post->setExibir($_POST['exibir']);
    $post->setDescricao(trim(strip_tags($_POST['descricao'])));
    $post->setConteudo(strip_tags(stripslashes($_POST['texto']), $allowedTags));
    $post->setAutor($_SESSION['idUsuario']);
    $erros_post = $post->validarCampos();
    $erros_post .= $post->validarFoto($_FILES["foto"]);

    if ($erros_post == "") {
        $post_ctrl = new CtrlPostagem();
        $post_ctrl->cadastrar($post);
        echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!<br> CADASTRADO COM SUCESSO </strong>
            </div>';
        echo "<script>";
        echo 'setTimeout(function(){ window.location.href = "home.php?acao=ver-postagens"; }, 2000);';
        echo "</script>";
    } else {
        echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>FALHA AO CADASTRAR!<br> ' . $erros_post . ' </strong>
            </div>';
    }
}
?>