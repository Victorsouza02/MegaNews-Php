<?php

if(isset($_POST['categoria'])){
    $ctrl_cat = new CtrlCategoria();
    $ctrl_cat->deletar($_POST['categoria']);
    echo "<script>alertify.alert('Categoria Deletada','Categoria foi deletada com sucesso')</script>";
}

?>
