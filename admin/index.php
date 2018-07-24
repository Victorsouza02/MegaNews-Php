<?php
session_start();
include_once "../controller/CtrlUsuario.php";
include_once "../controller/CtrlGrupo.php";

// VERIFICA SE JA TEM SESSÃO CRIADA
if (isset($_SESSION['login'])) {
    include_once '../include/constantes.php';
    if (NIVELACESSO >= 1) {
        echo "<script>window.location.href= 'home.php' </script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login - WVA System</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/pages/signin.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="brand" href="index.html">
                        Login - WVA System			
                    </a>		

                    <div class="nav-collapse">
                        <ul class="nav pull-right">

                            <li class="">						
                                <a href="lembrar-me.html" class="">
                                    Esqueceu sua senha?
                                </a>

                            </li>

                            <li class="">						
                                <a href="../index.php" class="">
                                    <i class="icon-chevron-left"></i>
                                    Acessar o site
                                </a>

                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->	

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->



        <div class="account-container">
<?php
include_once '../include/funcoesAdmin/loginAdmin.php';
?>
            <div class="content clearfix">

                <form action="#" method="post">

                    <h1>Faça seu Login</h1>		

                    <div class="login-fields">

                        <p>Entre com seus dados:</p>

                        <div class="field">
                            <label for="username">Usuário</label>
                            <input type="text" id="username" name="login" value="" placeholder="Usuário" class="login username-field" />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Senha:</label>
                            <input type="password" id="password" name="pws" value="" placeholder="Senha" class="login password-field"/>
                        </div> <!-- /password -->

                    </div> <!-- /login-fields -->

                    <div class="login-actions">



                        <input type="submit" name="botao" value="Entrar no Sistema" class="button btn btn-success btn-large"/>

                    </div> <!-- .actions -->



                </form>

            </div> <!-- /content -->

        </div> <!-- /account-container -->


        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/bootstrap.js"></script>

        <script src="js/signin.js"></script>

    </body>

</html>
