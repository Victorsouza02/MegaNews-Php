<!-- STATISTIC-->
<?php
$ctrlpost = new CtrlPostagem();
$ctrluser = new CtrlUsuario();
?>
<section class="statistic mt-5">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-4 col-lg-4">
                    <div class="statistic__item">
                        <h2 class="number"><?php echo $ctrluser->numUsuarios() ?></h2>
                        <span class="desc">Membros</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="statistic__item">
                        <h2 class="number"><?php echo $ctrlpost->numPostagens() ?></h2>
                        <span class="desc">Postagens Criadas</span>
                        <div class="icon">
                            <i class="zmdi zmdi-email"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="statistic__item">
                        <h2 class="number">1,086</h2>
                        <span class="desc">Categorias Criadas</span>
                        <div class="icon">
                            <i class="zmdi zmdi-email"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END STATISTIC-->

<section>
    <div class="container">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-data3">
                <thead>
                <h3 class="text-center my-3">Ultimas postagens</h3>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Autor</th>
                    <th>Exibir</th>
                    <th>Foto</th>
                    <th class="text-left">Ação</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $caminho_foto = "../upload/postagens/";
                    $ctrl_postagem = new CtrlPostagem();
                    $lista = $ctrl_postagem->listarPostagens();
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
                        echo "<td>" . $lista[$i]['exibir'] . "</td>";
                        echo "<td> <img src='" . $caminho_foto . $lista[$i]['foto'] . "' style='min-width:100px; min-height:70px; max-width:130px;' /></td>";
                        echo "<td class='td-actions'> <a href='home.php?acao=editar-postagem&id=$idPostagem' class='mx-1 btn btn-success btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-edit'> </i></a>";
                        echo "<a href='home.php?acao=ver-postagens&delete=$idPostagem' class='mx-1 btn btn-danger btn-sm' style='display:inline;'><i class='btn-icon-only fa fa-eraser'> </i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>