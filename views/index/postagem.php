
<?php
$ctrl = new CtrlPostagem();
$ctrl_user = new CtrlUsuario();
$dados = $ctrl->dadosPostagemById($_GET['idpost']);
$dadosautor = $ctrl_user->dadosUsuarioById($dados['idUsuario']);
?>

<div class="row">
    <div class="col-12">
        <h1 class="text-center"> <?php echo $dados['titulo']; ?> </h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?php echo $dados['texto']; ?>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <h6 class="text-center">Autor da Postagem : <?php echo $dadosautor['login']?></h6>
    </div>
</div>




