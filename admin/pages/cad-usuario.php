<?php
// VERIFICAR NIVEL DE ACESSO
if (!(NIVELACESSO >= 2)) {
    echo "<script>window.location.href= 'home.php' </script>";
    exit;
}
include_once '../include/funcoesAdmin/cadastroUsuario_admin.php';
?>
<div>
    <form method="POST" enctype="multipart/form-data" >
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" id="username" tabindex="1" class="form-control" placeholder="Nome" value="">
        </div>
        <label>Login</label>
        <input type="type" name="login" id="email" tabindex="1" placeholder="Usuario" value="">
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="pws" id="password" tabindex="2" class="form-control" placeholder="Senha">
        </div>
        <div class="form-group">
            <label>Confirmar Senha</label>
            <input type="password" name="confpws" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar Senha">
        </div>

        <div class="form-group">											
            <label class="mr-3">Foto do Perfil</label>
            <input type="file" multiple class="span6 fileinput" id="imagem" name="fotousuario">				
        </div> <!-- /control-group -->
        
        <div class="form-group">
            <label>Selecionar Grupo</label>
            <select name="gruposelect">
                <?php
                include_once '../controller/CtrlGrupo.php';
                $ctrlgrupo = new CtrlGrupo();
                $ctrlgrupo->listarGruposByNivel(NIVELACESSO);
                ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <input type="submit" name='botaocad' class='btn btn-success' value='Cadastrar'>
        </div>
    </form>
</div>
