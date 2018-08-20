<?php
// VERIFICAR NIVEL DE ACESSO
if (!(NIVELACESSO >= 2)) {
    echo "<script>window.location.href= 'home.php' </script>";
    exit;
}
?>

<section style="margin-top:5%;">
    <div class="container">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-data3">
                <thead>
                <h3 class="text-center my-3">Usuários</h3>
                <?php include_once '../include/funcoesAdmin/deletarUsuario.php';?>
                <a href="home.php?acao=cad-usuario" class="ml-2"><button type="button" class="btn btn-success my-2">Novo Usuário</button></a>
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-6 ml-2">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="botaobusca">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                </div>
                                <input type="text" id="input1-group2" name="inputbusca" placeholder="Login" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>   
                    <tr>
                        <th> # </th>
                        <th> Nome </th>
                        <th> Login</th>
                        <th> Foto </th>
                        <th> Grupo</th>
                        <th class="text-left"> Ações </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php include_once '../include/funcoesAdmin/listaUsuarios.php'; ?>
                    </tbody>
            </table>
        </div>
    </div>
</section>
