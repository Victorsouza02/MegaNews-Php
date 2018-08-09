<?php

if (isset($_GET['post'])) {
    include_once 'views/postagens/postagemUnica.php';
} else if (isset($_GET['cat'])) {
    $ctrl_cat = new CtrlCategoria();
    $nomecat = $ctrl_cat->obterNomeCat($_GET['cat']);
    echo '<h1 class="text-center">' . $nomecat . '</h1>';
    include_once "views/postagens/postagensPorCategoria.php";
} elseif (isset($_GET["busca"])) {
    include_once "views/postagens/postagemPesquisa.php";
} else {
    echo '<h1 class="text-center">Notícias</h1>';
    include_once 'views/postagens/postagensTodas.php';
}
?>

