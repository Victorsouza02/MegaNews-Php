<?php

// VERIFICAR NIVEL DO USUARIO 
if (NIVELACESSO >= 1) {
    if (isset($_GET['delete'])) {
        $id_selecionado = $_GET['delete'];
        $ctrlpost = new CtrlPostagem();
        $dados = $ctrlpost->dadosPostagemById($id_selecionado);
        $ctrlpost->deletar($id_selecionado);
        unlink("../upload/postagens/".$dados['foto']);
        echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!</strong> Postagem deletada com sucesso
            </div>';
        echo "<script>";
        echo 'setTimeout(function(){ window.location.href = "home.php?acao=ver-postagens"; }, 4000);';
        echo "</script>";
    }
} else {
    echo "<script>";
    echo 'window.location.href = "home.php?acao=ver-usuarios";';
    echo "</script>";
    exit;
}
?>