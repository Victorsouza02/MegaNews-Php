<?php include_once "../include/funcoesAdmin/editarLanc.php"; ?> 
<section style="margin-top:5%;">
    <div class="container">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-data3">
                <thead>
                <h3 class="text-center my-3">Lançamentos</h3>
                <a href="home.php?acao=ver-postagens" class="ml-2"><button type="button" class="btn btn-success my-2">Voltar para Postagens</button></a>
                <tr>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Data de Lançamento</th>
                    <th class="text-center">Ação</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $ctrl_postagem = new CtrlPostagem();
                    $lista = $ctrl_postagem->listarLancamentos();
                    foreach ($lista as $i => $value) {
                        $titulo = $lista[$i]['nome'];
                        $data = $lista[$i]['data'];
                        $id = $lista[$i]['idLanc'];
                        echo "<tr>";
                        echo "<td class='text-center'>$titulo</td>";
                        echo "<td class='text-center'>".date('d/m/Y', strtotime($data))."</td>";
                        echo "<td class='text-center'><button data-toggle='modal' class='btn btn-success' data-target='#editlanc$id'>Editar</button></td>";
                        echo "</tr>";
                        
                        echo '<form id="form-cadcat" method="post" role="form" autocomplete="off">
        <div class="modal fade" id="editlanc'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Lançamento</h5>                    
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Titulo do Jogo</label>
                            <input class="form-control" type="text" name="titulo" value="'.$titulo.'">
                        </div>
                        <div class="form-group">
                            <label for="">Data de Lançamento</label>
                            <input class="form-control" type="date" name="data" value="'.$data.'">
                        </div>
                        <input type="hidden" name="idlanc" value="'.$id.'">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="editlanc" > Editar</button>
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