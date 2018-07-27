<?php
session_start();
include_once 'views/index/header.html';
include_once 'controller/CtrlUsuario.php';
include_once 'controller/CtrlGrupo.php';
include_once 'controller/CtrlPostagem.php';
include_once 'include/verificarSessaoIndex.php';
?>

<!-- SLIDES -->
<section id="slides" class="corsecaoslides">
    <div class="container-fluid pb-3">
        <div class="row">
            <div class="offset-md-1 col-md-6">
                <!-- #################### INICIO CAROUSEL ################## -->
                <div id="carousel-example-2" class="carousel slide carousel-fade mt-3" data-ride="carousel">
                    <?php include_once 'include/slidesconteudo.php' ?>
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
                    <div class="col-md-12 py-1 px-0" style="position: relative;">
                        <img src="http://localhost/upload/postagens/8669664eebb5ff87d2ae5863e9661a01.jpg" class="w-100">
                        <div class="bottom-right fontebranca w-100"><h5 class="text-center">Novo jogo do Homem Aranha é anunciado</h5></div>
                    </div>      
                    <div class="col-md-12 py-1 px-0" style="position: relative;">
                        <img src="http://localhost/upload/postagens/8669664eebb5ff87d2ae5863e9661a01.jpg" class="w-100">
                        <div class="bottom-right fontebranca w-100"><h5 class="text-center">Novo jogo do Homem Aranha é anunciado</h5></div>
                    </div>      
                    
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
                <?php if(isset($_GET['acao']) && $_GET['acao'] == "postagem" && isset($_GET['idpost'])){
                    include_once 'views/index/postagem.php';
                }else {
                    echo '<h1 class="text-center"> Notícias</h1>';
                    include_once 'include/postagens.php';                   
                }
                ?>
                
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