<?php
$slides_ctrl = new CtrlPostagem();
$slides_conteudo = $slides_ctrl->exibirUltimasNoticias(5);
$caminho = "upload/postagens/";
?>          


<!--Indicators-->
<ol class="carousel-indicators">
    <?php
    foreach ($slides_conteudo as $key => $value) {
        if ($key == 0) {
            echo '<li data-target="#carousel-example-2" data-slide-to="' . $key . '" class="active"></li>';
        } else {
            echo '<li data-target="#carousel-example-2" data-slide-to="' . $key . '"></li>';
        }
    }
    ?>
</ol>
<!--/.Indicators-->
<!--Slides-->
<div class="carousel-inner" style="width: 100%;max-height: 550px;" role="listbox">

    <?php
    foreach ($slides_conteudo as $key => $value) {
        $idpost = $slides_conteudo[$key]['idPostagem'];
        if ($key == 0) {
            echo '<div class="carousel-item active">
        <div class="view hm-black-light">
            <img class="d-block w-100 fotocarousel" src="' . $caminho.$slides_conteudo[$key]['foto'] . '" alt="First slide">
            <div class="mask"></div>
        </div>
        <div class="carousel-caption textocarousel">
            <h3 class="h3-responsive tituloslide"><a href="index.php?acao=postagem&idpost='.$idpost.'#postagem">' . $slides_conteudo[$key]['titulo'] . '</a></h3>
        </div>
    </div>';
        } else {
            echo '<div class="carousel-item">
        <!--Mask color-->
        <div class="view hm-black-strong">
            <img class="d-block w-100 fotocarousel" src="' . $caminho.$slides_conteudo[$key]['foto'] . '" alt="Second slide">
            <div class="mask"></div>
        </div>
        <div class="carousel-caption">
            <h3 class="h3-responsive tituloslide"><a href="index.php?acao=postagem&idpost='.$idpost.'#postagem">' . $slides_conteudo[$key]['titulo'] . '</a></h3>
        </div>
    </div>';
        }
    }
    ?>
</div>

