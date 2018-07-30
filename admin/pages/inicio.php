<div class="row">
    <div class="span12">
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Olá, <?php echo $_SESSION['login'] ?></strong> Seja Bem vindo ao painel de Administrador !
        </div>
    </div>


    <div class="span12">	      		
        <div id="target-1" class="widget">	      			
            <div class="widget-content">	      				
                <h1>Apresentação</h1>			      		
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, tellus in feugiat fringilla, risus diam bibendum magna, hendrerit ultrices neque diam eu magna. In mattis vel velit eget accumsan. Quisque et ex ultricies, venenatis nisl lacinia, luctus tellus. Donec rhoncus, ex at consequat maximus, nisi arcu ultricies elit, ut pellentesque massa risus et ipsum. Aliquam scelerisque massa et lacus porttitor, eget semper dui maximus. Praesent id eros interdum, finibus nibh a, tincidunt urna. Nunc orci justo, egestas eget ultricies sit amet, tincidunt id tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer finibus quis sem ac condimentum. Cras interdum interdum faucibus. Aenean leo nisl, luctus non metus nec, aliquam suscipit mi. Cras eu ultrices nulla, ac pretium nibh. Proin nunc dolor, sollicitudin quis aliquet ac, interdum et ligula.

                    Donec egestas turpis nec consequat tincidunt. Nulla quis enim quis nisi iaculis sagittis eget eleifend lectus. Duis auctor ipsum odio. Vestibulum blandit tortor non urna tincidunt fermentum. Donec dapibus diam diam. Nam finibus orci non tincidunt vulputate. Morbi eu lacinia massa. Sed at enim eget nisl pulvinar luctus ac eu turpis. Praesent ultrices ex vitae mauris mollis, sed aliquet tortor accumsan. Cras blandit, diam in vehicula vestibulum, magna ex elementum purus, vitae ullamcorper erat nisi accumsan purus. Nam venenatis ut sapien nec faucibus. Suspendisse venenatis consectetur mi a placerat. Donec a facilisis ipsum. </p>

            </div> <!-- /widget-content -->
        </div> <!-- /widget -->
    </div><!-- span 12 -->


</div><!-- row -->        


<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Últimas Postagens</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Titulo </th>
                    <th scope="col"> Descricao</th>
                    <th scope="col"> Autor</th>
                    <th scope="col"> Foto </th>
                    <th class="td-actions">Ações </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $caminho_foto = "../upload/postagens/";
                $ctrl_postagem = new CtrlPostagem();
                $lista = $ctrl_postagem->listarUltimasPostagens(5);
                $ctuser = new CtrlUsuario();
                foreach ($lista as $i => $value) {
                    $idAutor = $lista[$i]['idUsuario'];
                    $nomeAutor = $ctuser->dadosUsuarioById($idAutor);
                    $idPostagem = $lista[$i]['idPostagem'];
                    echo "<tr>";
                    echo "<th scope='row'>$idPostagem</th>";
                    echo "<td>" . $lista[$i]['titulo'] . "</td>";
                    echo "<td>" . $lista[$i]['descricao'] . "</td>";
                    echo "<td>" . $nomeAutor['login'] . "</td>";
                    echo "<td> <img src='" . $caminho_foto . $lista[$i]['foto'] . "' style='width:90px; height:50px' /></td>";
                    echo "<td class='td-actions'> <a href='home.php?acao=editar-postagem&id=$idPostagem' class='btn btn-small btn-success' style='display:inline;'><i class='btn-icon-only icon-edit'> </i></a>";
                    echo "<a href='home.php?acao=ver-postagens&delete=$idPostagem' class='btn btn-danger btn-small' style='display:inline;'><i class='btn-icon-only icon-remove'> </i></a></td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>
<!-- /widget --> 