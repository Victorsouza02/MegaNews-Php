 

<?php
$caminho = "upload/postagens/";
$max_por_pag = 3;

if (!isset($_GET['pagina'])) {
    $pc = 1;
} else {
    $pc = $_GET['pagina'];
}

$inicio = $pc - 1;
$inicio = $inicio * $max_por_pag;
$ctrl_posts = new CtrlPostagem();
$ctrl_user = new CtrlUsuario();
$total_posts = $ctrl_posts->listarPostagens();
$posts = $ctrl_posts->paginacaoPostagem($inicio, $max_por_pag);
$total_postagens = 0;

foreach ($total_posts as $key) {
    $total_postagens++;
}

foreach ($posts as $key => $value) {
    $idpost = $posts[$key]['idPostagem'];
    $foto = $caminho . $posts[$key]['foto'];
    $titulo = $posts[$key]['titulo'];
    $descricao = $posts[$key]['descricao'];
    $dadosautor = $ctrl_user->dadosUsuarioById($posts[$key]['idUsuario']);
    $autor = $dadosautor['login'];
    $data = $posts[$key]['data'];

    echo '<div class="row mt-3  formapostagem py-3"> <!-- POST INDIVIDUAL -->
        <div class="col-md-4 col-sm-12 " align="center">
            <img src="' . $foto . '" class="mx-auto img-fluid" alt="" >
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row" id="titulo">
                <div class="col-md-12 text-center">
                    <h3 class="h3-responsive">' . $titulo . '</h3>
                </div>
            </div>

            <div class="row" id="descricao">
                <div class="col-md-12 text-center">
                    <p>' . $descricao . '</p>
                    <a href="index.php?acao=postagem&idpost='.$idpost.'#postagem">Leia a notícia completa</a>
                </div>
            </div>

            <div class="row mt-2" id="autor">
                <div class="col-md-6 text-center">
                    <p>Autor : ' . $autor . '</p>
                </div>

                <div class="col-md-6 text-center">
                    <p>Data de Publicação : ' . $data . '</p>
                </div>
            </div>

            <div class="row mt-2" id="categoria">
                <div class="col-md-12 text-center">
                    <p>Categoria : <a href="#"> Categoria </a> </p>
                </div>
            </div>
        </div>
    </div> <!-- POST INDIVIDUAL --> ';
}

$total_paginas = $total_postagens / $max_por_pag;

$anterior = $pc - 1;
$proximo = $pc + 1;
echo "<div id='botoespaginacao' class='text-center'>";

if ($pc > 1) {
    echo "<a class='btn bg-nav mt-3 mx-2' href='?pagina=$anterior'> < Anterior </a>";
}

if ($pc < $total_paginas) {
    echo " <a class='btn bg-nav mt-3 mx-2' href='?pagina=$proximo'> Próximo > </a>";
}
echo "</div>";
?>




