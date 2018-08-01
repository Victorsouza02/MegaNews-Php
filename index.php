<?php
session_start();
include_once 'views/index/header.html';
include_once 'controller/CtrlUsuario.php';
include_once 'controller/CtrlGrupo.php';
include_once 'controller/CtrlPostagem.php';
include_once 'controller/CtrlCategoria.php';
include_once 'include/funcoesGerais/verificarSessaoIndex.php';
include_once 'views/index/topo.php';
?>

<!-- SLIDES -->
<section id="slides" class="corsecaoslides">
    <div class="container-fluid pb-3">
        <div class="row">
            <div class="offset-md-1 col-md-6">
                <!-- #################### INICIO CAROUSEL ################## -->
                <div id="carousel-example-2" class="carousel slide carousel-fade mt-3" style="width: 100%;max-height: 550px;"data-ride="carousel">
                    <?php include_once 'views/index/slidesconteudo.php' ?>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
                <!-- FIM COLUNA ULTIMAS NOTICIAS -->
            </div>

            <div class="col-md-3 col-md-offset-right-2 mt-3 d-none d-md-block" id="maisacessadas">
                <!-- #################### INICIO CAROUSEL ################## -->
                <div class="row">
                   <?php include_once 'views/index/maisacessadas.php';?>
                </div>
                <!-- FIM COLUNA ULTIMAS NOTICIAS -->
            </div>
            <!-- FIM LINHA -->
        </div>
    </div>
</section>
<!-- FIM SLIDES -->   

<!-- INICIO POSTAGENS -->
<section id="postagens">
    <div class="container" style="max-width: 1640px!important">
        <div class="row">
            <div class="col-md-9 ">
                <?php include_once 'include/funcoesGerais/verificarSecaoPostagem.php';?>
            </div>

            <div class="col-md-3 text-center d-none d-md-block">
                <h3 class="text-center"> Publicidade </h3>
                <iframe src="//cdn.bannersnack.com/banners/bcf0rf3ug/embed/index.html?userId=37677107&t=1532208734" width="200" height="720" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- FIM POSTAGENS -->    

<?php include_once 'views/index/footer.html'; ?>