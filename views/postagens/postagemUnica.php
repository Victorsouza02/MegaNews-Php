
<?php
$ctrl = new CtrlPostagem();
$ctrl_user = new CtrlUsuario();
$dados = $ctrl->dadosPostagemById($_GET['post']);
$dadosautor = $ctrl_user->dadosUsuarioById($dados['idUsuario']);
$ctrl->addContagem($dados['contagem'],$dados['idPostagem']);
?>
<section id="postagem">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center titulo px-3 py-3"> <?php echo $dados['titulo']; ?> </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo $dados['texto']; ?>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-12">
            <h5 class="text-center autor d-block">Autor da Postagem : <?php echo $dadosautor['login'] ?></h5>
        </div>
    </div>
</section>
<section id="comentarios">
    <div class="fb-comments" data-href="http://victorsouza02php.orgfree.com/index.php?post=<?php echo $_GET['post']?>" data-numposts="5" data-width="100%"></div>
</section>




