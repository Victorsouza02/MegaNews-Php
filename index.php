<?php
session_start(); // SESSÃO
// CONTROLLERS
include_once 'controller/CtrlUsuario.php';
include_once 'controller/CtrlGrupo.php';
include_once 'controller/CtrlPostagem.php';
include_once 'controller/CtrlCategoria.php';

// VISUAL
include_once 'views/index/header.html';
include_once 'include/funcoesGerais/verificarSessaoIndex.php';
include_once 'views/index/topo.php';

?>

<!-- SLIDES -->
<section id="slides" class="corsecaoslides">
    <div class="container-fluid pb-3">
        <div class="row">
            <?php include_once 'views/index/slides.php';?>
            <?php include_once 'views/index/maisacessadas.php';?>            
        </div>
    </div>
</section>
<!-- FIM SLIDES -->   

<!-- INICIO POSTAGENS -->
<section id="postagens">
    <div class="container" style="max-width: 1540px!important">
        <div class="row">
            <div class="col-md-9 ">
                <?php include_once 'include/funcoesGerais/verificarSecaoPostagem.php'; ?> 
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