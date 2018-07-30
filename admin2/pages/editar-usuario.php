<?php
// VERIFICAR NIVEL DE ACESSO
if (!(NIVELACESSO >= 2)) { //SE O NIVEL DE ACESSO NÃO FOR MAIOR OU IGUAL A 2
    echo "<script>window.location.href= 'home.php' </script>"; // REDIRECIONA PARA A HOME
    exit;
}
?>
<div class="col-md-8 offset-md-2" style="margin-top: 5%;">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card">
            <div class="card-header">
                <strong>Editar Usuário</strong>
                <?php
                include_once '../include/funcoesAdmin/editarUsuario.php';
                ?>
            </div>
            <div class="card-body card-block">       
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nome" class=" form-control-label">Nome</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nome" name="edit_nome" placeholder="<?php echo $nomeedit ?>" class="form-control">
                        <small class="form-text text-muted">Digite aqui o novo nome do usuário</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="login" class=" form-control-label">Login</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="login" name="edit_login" placeholder="<?php echo $loginedit ?>" class="form-control">
                        <small class="form-text text-muted">Digite aqui o novo Login do usuário</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="senha" class=" form-control-label">Senha</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="senha" name="edit_pws" placeholder="<?php echo $senhaedit ?>" class="form-control">
                        <small class="form-text text-muted">Digite aqui a nova senha do Usuário</small>
                    </div>
                </div>
                <?php
                if (!($_GET['id'] == $_SESSION['idUsuario'])) {
                    echo '<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="selectSm" class=" form-control-label">Grupo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="editgrupo" id="SelectLm" class="form-control-sm form-control">';
                    include_once '../controller/CtrlGrupo.php';
                    $ctrlgrupo = new CtrlGrupo();
                    $ctrlgrupo->listarGruposEdit($_GET['id'], NIVELACESSO);
                    echo '</select>
                    </div>
                </div>';
                }
                ?>


            </div>
            <div class="card-footer">
                <input type="submit" name="botaoeditar" class="btn btn-primary btn-sm" value="Editar"/>
                <input type="reset" name="cancelar" class="btn btn-danger btn-sm" value="Cancelar"/>
            </div>
        </div>
    </form>
</div>

