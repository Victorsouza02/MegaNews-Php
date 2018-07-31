<div class="col-md-8 offset-md-2" style="margin-top: 5%;">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card">
            <div class="card-header">
                <strong>Cadastrar novo usuário</strong>
                <?php
                include_once '../include/funcoesAdmin/cadastroUsuario_admin.php';
                ?>
            </div>
            <div class="card-body card-block">       
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nome</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nome" placeholder="Nome" class="form-control">
                        <small class="form-text text-muted">Digite aqui o nome do usuário</small>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Login</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="login" placeholder="Login" class="form-control">
                        <small class="form-text text-muted">Digite aqui o login do usuário</small>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Senha</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="text-input" name="pws" placeholder="******" class="form-control">
                        <small class="form-text text-muted">Digite aqui a senha do usuário</small>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Confirmar Senha</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="text-input" name="confpws" placeholder="******" class="form-control">
                        <small class="form-text text-muted">Digite aqui a confirmação de  senha do usuário</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Foto de Perfil</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="fotousuario" class="form-control-file">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="selectSm" class=" form-control-label">Grupo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="gruposelect" id="SelectLm" class="form-control-sm form-control">
                            <?php
                            include_once '../controller/CtrlGrupo.php';
                            $ctrlgrupo = new CtrlGrupo();
                            $ctrlgrupo->listarGruposByNivel(NIVELACESSO);
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <input type="submit" name="botaocad" class="btn btn-primary btn-sm" value="Confirmar"/>
                <input type="reset" name="cancelar" class="btn btn-danger btn-sm" value="Cancelar"/>
            </div>
        </div>
    </form>
</div>


