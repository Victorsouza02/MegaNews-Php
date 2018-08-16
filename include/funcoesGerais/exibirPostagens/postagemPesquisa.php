 
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
$posts = $ctrl_posts->buscaPorTitulo($inicio, $max_por_pag, $_GET['busca']);
$total_postagens = 0;

foreach ($posts as $key) {
    $total_postagens++;
}

echo '<h1 class="text-center">Resultados da Pesquisa(' . $total_postagens . ')</h1>';

foreach ($posts as $key => $value) {
    $idpost = $posts[$key]['idPostagem'];
    $foto = $caminho . $posts[$key]['foto'];
    $titulo = $posts[$key]['titulo'];
    
    $url_json = "https://graph.facebook.com/?ids=http://victorsouza02php.orgfree.com/index.php?post=".$idpost."";
    $dados = file_get_contents($url_json,0,null,null);
    $cont_comentarios = json_decode($dados , true);

    $ctrlcat = new CtrlCategoria();
    $idcategoria = $posts[$key]['idCategoria'];
    $nomecategoria = $ctrlcat->obterNomeCat($posts[$key]['idCategoria']);
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
                    <a href="index.php?post=' . $idpost . '#postagem">Leia a notícia completa</a>
                </div>
            </div>

            <div class="row mt-2" id="autor">
                <div class="col-md-6 text-center">
                    <p>Autor : ' . $autor . '</p>
                </div>

                <div class="col-md-6 text-center">
                    <p>Data de Publicação : ' . date('d/m/Y', strtotime($data)) . '</p>
                </div>
            </div>

            <div class="row mt-2" id="categoria">
                <div class="col-md-12 text-center">
                    <p>Categoria : <a href="index.php?cat=' . $idcategoria . '"> ' . $nomecategoria . ' </a> </p>
                </div>
            </div>
            
            <div class="icone_comentarios">
                 <i class="fas fa-comment"></i><span class="px-1">'.$cont_comentarios["http://victorsouza02php.orgfree.com/index.php?post=".$idpost.""]["share"]["comment_count"].'</span>
            </div>
            <div class="icone_visualizacao">
                <i class="fas fa-eye"></i><span class="px-1">' . $posts[$key]['contagem'] . '</span>
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

