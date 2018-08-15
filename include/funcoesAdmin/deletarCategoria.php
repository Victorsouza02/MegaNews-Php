<?php
    if(isset($_POST['botaodelcat'])){
        $ctrl = new CtrlCategoria();
        $resp = $ctrl->deletar($_POST['categoria']); 
        echo "<script>alertify.alert('Deletado com sucesso')</script>";
    }
?>

