
<div class="col-md-8 offset-md-2" style="margin-top: 5%;">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card">
            <div class="card-header">
                <strong>Inserir Nova Postagem</strong>
                <?php
                include_once '../include/funcoesAdmin/cadastroPostagem.php';
                ?>
            </div>
            <div class="card-body card-block">       
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Titulo da Postagem</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="titulo" placeholder="Titulo" class="form-control">
                        <small class="form-text text-muted">Digite aqui o titulo da postagem</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Imagem</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="foto" class="form-control-file">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="selectSm" class=" form-control-label">Exibir</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="exibir" id="SelectLm" class="form-control-sm form-control">
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input-desc" class=" form-control-label">Descrição</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input-desc" name="descricao" placeholder="Descrição" class="form-control">
                        <small class="form-text text-muted">Digite a descrição da postagem</small>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textareapost" class=" form-control-label">Conteúdo Principal</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="texto" id="textareapost" rows="9" placeholder="Conteúdo" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="cadastrar" class="btn btn-primary btn-sm" value="Confirmar"/>
                <input type="reset" name="cancelar" class="btn btn-danger btn-sm" value="Cancelar"/>
            </div>
        </div>
    </form>
</div>
