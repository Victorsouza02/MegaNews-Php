<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Painel Admin</a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-cog"></i> Administrativo <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php
                                    if(NIVELACESSO >= 1){
                                       echo  '<li><a href="home.php?acao=ver-postagens">Gerenciar Postagens</a></li>';
                                    } 
                                    
                                    if (NIVELACESSO >= 2){
                                        echo '<li><a href="#">Gerenciar Categorias</a></li>';
                                        echo '<li><a href="home.php?acao=ver-usuarios">Gerenciar Usuários</a></li>';
                                    }
                                    
                                ?>

                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i> <?php echo $_SESSION['login'] ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../index.php">Voltar ao site</a></li>
                                <li><a href="?sairadmin">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse --> 
            </div>
            <!-- /container --> 
        </div>
        <!-- /navbar-inner --> 
    </div>
    <!-- /navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">    
                    <li><a href="home.php"><i class="icon-dashboard"></i><span>Homepage</span> </a> </li>
                    <!-- INICIO MENU DE POSTAGENS -->
                    
                    <li  class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-file"></i><span>Postagens</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown"><a href="home.php?acao=ver-postagens">Visualizar</a></li>
                            <li><a href="home.php?acao=cad-postagem">Cadastrar</a></li>
                        </ul>
                    </li>
                    <!-- MENU DE POSTAGENS -->
                    
                    <!-- MENU DE USUARIOS -->
                    <!-- AUTORIZAÇÃO -->
                    <?php
                        if(NIVELACESSO >= 2){
                            echo '<li  class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Usuários</span> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="home.php?acao=ver-usuarios">Visualizar</a></li>
                                        <li><a href="home.php?acao=cad-usuario">Cadastrar</a></li>
                                     </ul>
                                </li>';
                        }
                    ?>
                    <!-- FIM MENU DE USUARIOS -->
                    <li></li>
                </ul>
            </div>
            <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
    </div>
    <!-- /subnavbar -->
