<?php
session_start();
include_once "../controller/CtrlUsuario.php";
include_once "../controller/CtrlGrupo.php";
include_once "../controller/CtrlPostagem.php";

if (isset($_SESSION['login'])) {
    include_once '../include/constantes.php';
    // VERIFICAR SE A SESSION BATE COM O GRUPO ATUAL
    $ctrl_user = new CtrlUsuario();
    $idGrupo_atual = $ctrl_user->obterIdGrupoAtual($_SESSION['idUsuario']);
    if ($idGrupo_atual != IDGRUPO) {
        include_once '../classes/Sessao.php';
        $sessao = new Sessao();
        $sessao->encerrarSessao();
        echo "<script>window.location.href = 'index.php'</script>";
        exit;
    }
    // ################################## FIM VERIFICAÇÃO
    // CARREGAR NIVEL DE ACESSO DO USUARIO
    if (!(NIVELACESSO >= 1)) {
        echo "<script>window.location.href= 'index.php' </script>";
        exit;
    }
    // ###################### FIM CARREGAR NIVEL
} else {
    echo "<script>window.location.href= 'index.php' </script>";
    exit;
}

include_once '../include/funcoesAdmin/deslogarAdmin.php';
include_once 'include/header.html';
include_once 'include/menus.php';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    if ($acao == "ver-postagens") {
        include_once 'pages/ver-postagens.php';
    };
    if ($acao == "cad-postagem") {
        include_once 'pages/cad-postagem.php';
    };
    if ($acao == "editar-postagem") {
        include_once 'pages/editar-postagem.php';
    };
    if ($acao == "ver-usuarios") {
        include_once 'pages/ver-usuarios.php';
    };
    if ($acao == "cad-usuario") {
        include_once 'pages/cad-usuario.php';
    };
    if ($acao == "editar-usuario") {
        include_once 'pages/editar-usuario.php';
    };
    if ($acao == "editar-postagem") {
        include_once 'pages/editar-postagem.php';
    };
} else {
    include_once 'pages/inicio.php';
}
include_once 'include/footer.html'
?>

