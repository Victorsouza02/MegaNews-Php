<?php include_once "../include/funcoesAdmin/editarVideo.php"; ?> 
<section style="margin-top:5%;">
    <div class="container">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-data3">
                <thead>
                <h3 class="text-center my-3">Videos</h3>
                <a href="home.php?acao=ver-postagens" class="ml-2"><button type="button" class="btn btn-success my-2">Voltar para Postagens</button></a>
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Video</th>
                    <th class="text-center">Ação</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $ctrl_postagem = new CtrlPostagem();
                    $lista = $ctrl_postagem->listarVideos();
                    foreach ($lista as $i => $value) {
                        $nome = $lista[$i]['nome'];
                        $url = $lista[$i]['url'];
                        $id = $lista[$i]['idVideo'];
                        echo "<tr>";
                        echo "<td class='text-center'>$nome</td>";
                        echo "<td><iframe width='360' style='display:block ; margin: 0 auto;'height='205' src='$url' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe></td>";
                        echo "<td class='text-center'><button data-toggle='modal' class='btn btn-success' data-target='#editvideo$id'>Editar</button></td>";
                        echo "</tr>";
                        
                        echo '<form id="form-cadcat" method="post" role="form" autocomplete="off">
        <div class="modal fade" id="editvideo'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Video</h5>                    
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Titulo do Video</label>
                            <input class="form-control" type="text" name="titulo" value="'.$nome.'">
                        </div>
                        <div class="form-group">
                            <label for="">URL do video</label>
                            <input class="form-control" type="text" name="url" value="'.$url.'">
                        </div>
                        <input type="hidden" name="idvideo" value="'.$id.'">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="editvideo" > Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>';
                    }
                    ?>
                </tbody>
            </table>
        </div>       
    </div>



