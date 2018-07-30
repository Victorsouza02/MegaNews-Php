
<?php
$ctrl = new CtrlPostagem();
$ctrl_user = new CtrlUsuario();
$dados = $ctrl->dadosPostagemById($_GET['idpost']);
$dadosautor = $ctrl_user->dadosUsuarioById($dados['idUsuario']);
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




