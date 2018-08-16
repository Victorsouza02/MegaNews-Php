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

<!-- INICIO POSTAGENS/TOP/ULTIMOS LANCAMENTOS -->
<section id="postagens">
    <div  style="padding-left: 7%; padding-right: 7%;">
        <div class="row">
            <div class="col-lg-8 mr-2 ">
                <?php include_once 'views/postagem.php'; ?> 
            </div>
            <div class="col-md-3 px-2  text-center d-none d-lg-block" >
                <h1>Informações</h1>
                    <!-- INICIO TOP POSTAGENS -->
                    <?php include_once 'views/top_postagens.php'; ?>                   
                    <!-- FIM TOP POSTAGENS -->
                    
                    <!-- INICIO ULTIMOS LANÇAMENTOS -->
                    <?php include_once 'views/ultimoslancamentos.php';?>    
                    <!-- FIM ULTIMOS LANÇAMENTOS -->
            </div>
        </div>
    </div>
</section>
<!-- FIM POSTAGENS -->

<section id="videos" class="secaovideos container-fluid">
    <h1 class="text-center py-1">Videos Recentes</h1>
    <div class="row px-2 py-5">
        <div class="col-md-2"></div>
        <?php include_once 'include/funcoesGerais/exibirVideos.php';?>
        <div class="col-md-2"></div>
    </div>
</section>

<?php include_once 'views/footer.html'; ?>