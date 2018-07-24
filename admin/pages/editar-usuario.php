<?php
// VERIFICAR NIVEL DE ACESSO
if(! (NIVELACESSO >= 2)){ //SE O NIVEL DE ACESSO NÃO FOR MAIOR OU IGUAL A 2
    echo "<script>window.location.href= 'home.php' </script>"; // REDIRECIONA PARA A HOME
    exit;
}
include_once '../include/funcoesAdmin/editarUsuario.php';

?>
<form method="POST">
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="edit_nome" id="username" tabindex="1" class="form-control" placeholder="<?php echo $nomeedit ?>" value=''>
    </div>
    <div class="form-group">
        <label>Login</label>
        <input type="type" name="edit_login" id="email" tabindex="1" class="form-control" placeholder="<?php echo $loginedit ?>" value="">
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="edit_pws" id="password" tabindex="2" class="form-control" placeholder="<?php echo $senhaedit ?> " value="">
    </div>
    <div class="form-group">
        <label>Grupo</label>
        <select name="editgrupo">
            <?php
            include_once '../controller/CtrlGrupo.php';
            $ctrlgrupo = new CtrlGrupo();
            $ctrlgrupo->listarGruposEdit($_GET['id'],NIVELACESSO);
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="botaoeditar" class="btn btn-success" value="Editar Usuário">
    </div>

</form>