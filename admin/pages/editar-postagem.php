
<div class="col-md-8 offset-md-2" style="margin-top: 5%;">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card">
            <div class="card-header">
                <strong>Inserir Nova Postagem</strong>
                <?php
                include_once '../include/funcoesAdmin/editarPostagem.php';
                ?>
            </div>
            <div class="card-body card-block">       
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Titulo da Postagem</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="titulo" placeholder="<?php echo $titulo_atual ?>" class="form-control">
                        <small class="form-text text-muted">Digite aqui o titulo da postagem</small>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Imagem Atual</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <img src="<?php echo $caminho_img.$foto_atual ;?>" style="width:600px; max-width: 100%;  height:auto"/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Nova Imagem</label>
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
                        <label for="selectSm" class=" form-control-label">Categoria</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="categoria" id="SelectLm" class="form-control-sm form-control">
                            <?php
                                $ctrl_cat = new CtrlCategoria();
                                $dados_cat = $ctrl_cat->listarCategorias();                   
                                $ctrl_post = new CtrlPostagem();
                                $dadospost = $ctrl_post->dadosPostagemById($_GET['id']);                    
                                foreach ($dados_cat as $key => $value) {
                                    if($dadospost['idCategoria'] == $dados_cat[$key]['idCategoria']){
                                    echo "<option value='".$dados_cat[$key]['idCategoria']."' selected>".$dados_cat[$key]['nome']."</option>";
                                    } else {
                                        echo "<option value='".$dados_cat[$key]['idCategoria']."'>".$dados_cat[$key]['nome']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input-desc" class=" form-control-label">Descrição</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input-desc" name="descricao" placeholder="<?php echo $descricao_atual ?>" class="form-control">
                        <small class="form-text text-muted">Digite a descrição da postagem</small>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Conteúdo Principal</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="texto" id="textarea-input" rows="9" class="form-control">
                        <?php echo $texto_atual?></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="editarpostagem" class="btn btn-primary btn-sm" value="Confirmar"/>
                <input type="reset" name="cancelar" class="btn btn-danger btn-sm" value="Cancelar"/>
            </div>
        </div>
    </form>
</div>


