<?php
session_start(); // SESSÃO
// CONTROLLERS
include_once 'controller/CtrlUsuario.php';
include_once 'controller/CtrlGrupo.php';
include_once 'controller/CtrlPostagem.php';
include_once 'controller/CtrlCategoria.php';
// VISUAL e FUNÇÕES
include_once 'views/header.html';
include_once 'include/funcoesGerais/carregarFuncoes.php';
include_once 'views/topo.php';
?>

<!-- SLIDES -->
<section id="slides" class="corsecaoslides">
    <div class="container-fluid pb-3">
        <div class="row">
            <?php include_once 'views/slides.php'; ?>
            <?php include_once 'views/maisacessadas.php'; ?>            
        </div>
    </div>
</section>
<!-- FIM SLIDES -->   

<!-- INICIO POSTAGENS -->
<section id="postagens">
    <div  style="padding-left: 7%; padding-right: 7%;">
        <div class="row">
            <div class="col-lg-8 mr-2 ">
                <?php include_once 'views/postagem.php'; ?> 
            </div>


            <div class="col-md-3 px-2 text-center d-none d-lg-block" style="margin-top: 3.8%">

                <div class="row"> <!-- INICIO TOP 5 POSTAGENS -->
                    <div class="col-lg-12 formatop">
                        <h3 class="text-center" style="border-bottom: 5px solid #2859cd;"> Top 3 Postagens </h3>             
                        <div class="row mb-3" >
                            <div class="col-md-4">
                                <img src="http://localhost/upload/postagens/5a0d7d5f69f395ea1229125dbea223f6.jpg" class="w-100"/>
                            </div>
                            <div class="col-md-8">
                                <p>Cooler , irmão de Freeza , é confirmado no DB FighterZ</p>
                            </div>
                        </div>
                        <div class="row mb-3" >
                            <div class="col-md-4">
                                <img src="http://localhost/upload/postagens/5a0d7d5f69f395ea1229125dbea223f6.jpg" class="w-100"/>
                            </div>
                            <div class="col-md-8">
                                <p>Cooler , irmão de Freeza , é confirmado no DB FighterZ</p>
                            </div>
                        </div>
                        <div class="row mb-3" >
                            <div class="col-md-4">
                                <img src="http://localhost/upload/postagens/5a0d7d5f69f395ea1229125dbea223f6.jpg" class="w-100"/>
                            </div>
                            <div class="col-md-8">
                                <p>Cooler , irmão de Freeza , é confirmado no DB FighterZ</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- FIM LINHA TOP 5 POSTAGENS -->

                <div class="row mt-5" id="ultimoslanc"> <!-- INICIO Hoje -->
                    <div class="col-lg-12 formatop">
                        <h3 class="text-center" style="border-bottom: 5px solid #2859cd;"> Ultimos Lançamentos </h3>             
                        <div class="row mb-3" >
                            <div class="col-md-5">
                                <p>15/08/2018</p>
                            </div>
                            <div class="col-md-7">
                                <p>KOF All Stars</p>
                            </div>
                        </div>
                        <div class="row mb-3" >
                            <div class="col-md-5">
                                <p>16/08/2018</p>
                            </div>
                            <div class="col-md-7">
                                <p>Red Dead Redemption 2</p>
                            </div>
                        </div>
                        <div class="row mb-3" >
                            <div class="col-md-5">
                                <p>17/08/2018</p>
                            </div>
                            <div class="col-md-7">
                                <p>Grand Theft Auto VI</p>
                            </div>
                        </div>
 
                    </div>
                </div> <!-- FIM LINHA TOP 5 POSTAGENS -->

            </div>
        </div>
    </div>
</section>

<!-- FIM POSTAGENS -->

<section id="videos" class="secaovideos container-fluid">
    <h1 class="text-center py-1">Videos Recentes</h1>
    <div class="row px-2 py-5">
        <div class="col-md-2"></div>
        <div class="col-md-4 px-2">
            <div class="row mb-3">
                <div class="col-12">
                    <iframe width="80%" height="250" style="display: block; margin: 0 auto;"src="https://www.youtube.com/embed/5qGeqsT7cBI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="col-12">
                    <h3 class="text-center py-2">Titulo do Video</h3>
                </div>
            </div>        
        </div>
        <div class="col-md-4 px-2">
            <div class="row mb-3">
                <div class="col-12">
                    <iframe width="80%" height="250" style="display: block; margin: 0 auto;"src="https://www.youtube.com/embed/5qGeqsT7cBI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="col-12">
                    <h3 class="text-center py-2">Titulo do Video</h3>
                </div>
            </div>        
        </div>
        <div class="col-md-2"></div>
    </div>
</section>

<?php include_once 'views/footer.html'; ?>