<?php
    include_once '../include/funcoesAdmin/cadastroPostagem.php';
?>


<div class="tab-pane" id="formcontrols">
    <form id="edit-profile" class="form-horizontal" action="" method="post" enctype="multipart/form-data">


        <div class="control-group">											
            <label class="control-label" for="titulo">Título da Postagem</label>
            <div class="controls">
                <input type="text" class="span6 disabled" id="titulo" value="" name="titulo">
            </div> <!-- /controls -->				
        </div> <!-- /control-group -->



        <div class="control-group">											
            <label class="control-label" for="lastname">Imagem</label>
            <div class="controls">
                <input type="file" multiple class="span6 fileinput" id="imagem" name="foto">
            </div> <!-- /controls -->				
        </div> <!-- /control-group -->


        <div class="control-group">											
            <label class="control-label" for="username">Exibir</label>
            <div class="controls">
                <select class="span2" id="exibir"  name="exibir">
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div> <!-- /controls -->				
        </div> <!-- /control-group -->


        <div class="control-group">											
            <label class="control-label" for="email">Descrição</label>
            <div class="controls">
                <textarea class="span8" name="descricao" id="descricao" value="" rows="2"></textarea>
            </div> <!-- /controls -->				
        </div> <!-- /control-group -->

        <div class="control-group">											
            <label class="control-label" for="email">Conteúdo</label>
            <div class="controls">
                <textarea class="span8" name="texto" id="descricao" value="" rows="10"></textarea>
            </div> <!-- /controls -->				
        </div> <!-- /control-group -->



        <div class="form-actions">
            <input type="submit" name="cadastrar" class="btn btn-primary" value="Salvar">
            <input type="reset" class="btn" value="Cancelar">
        </div> <!-- /form-actions -->
    </form>