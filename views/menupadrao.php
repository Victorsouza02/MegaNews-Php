<li>
    <a class="nav-link" data-toggle="modal" data-target="#cadastroModal" href="#">Cadastre-se
        <span class="sr-only">(current)</span>
    </a>
</li>
<li>
    <a class="nav-link" data-toggle="modal" data-target="#entrarModal" href="#">Login</a>
</li>


<!-- Modal ENTRAR USUARIO -->
<form id="ajax-register-form" method="post" role="form" autocomplete="off">
    <div class="modal fade" id="entrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <input class="form-control" type="text" name="login">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input class="form-control" type="password" name="pws">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="botao" value="Entrar">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal CADASTRO USUARIO -->
<form id="ajax-register-form" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuários</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" id="username" tabindex="1" class="form-control" placeholder="Nome" value="">
                    </div>
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" name="login" id="email" tabindex="1" class="form-control" placeholder="Usuario" value="">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="pws" id="password" tabindex="2" class="form-control" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label>Confirmar Senha</label>
                        <input type="password" name="confpws" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar Senha">
                    </div>

                    <div class="form-group">											
                        <label class="mr-3">Foto de Perfil(Opcional até 400x400)</label>
                        <input type="file" multiple class="span6 fileinput" id="imagem" name="fotousuario">				
                    </div> <!-- /control-group -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="botaoregistrar" value="Registrar">
                </div>
            </div>
        </div>
    </div>
</form>
