<?php

if (isset($_GET['acao']) && $_GET['acao'] == "postagem" && isset($_GET['idpost'])) {
    include_once 'views/index/postagem.php';
} else if (isset($_GET['cat'])) {
    $ctrl_cat = new CtrlCategoria();
    $nomecat = $ctrl_cat->obterNomeCat($_GET['cat']);
    echo '<h1 class="text-center">' . $nomecat . '</h1>';
    include_once "views/index/postagensPorCategoria.php";
} else {
    echo '<h1 class="text-center"> Notícias</h1>';
    include_once 'views/index/postagens.php';
}

?>

