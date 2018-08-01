<?php
include_once 'classes/Sessao.php';
if (isset($_REQUEST['sair'])) {
    $sessao = new Sessao();
    $sessao->encerrarSessao();
    echo "<script>window.location.href = 'index.php'</script>";
}
?>

