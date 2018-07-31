<?php
$caminhofoto = "../upload/foto_perfil/";
?>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?php  if (FOTOUSUARIO == "") {echo $caminhofoto."embranco.png";} else {echo $caminhofoto.FOTOUSUARIO;} ?>" />
                    </div>
                    <h4 class="name"><?php echo $_SESSION['login'] ?></h4>
                    <a href="?sairadmin">Sair</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="home.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="home.php?acao=ver-postagens">
                                <i class="fas fa-file"></i>Postagens</a>
                        </li> 
                        <?php if (NIVELACESSO >= 2){ // EXIBE A OPÇÃO USUARIO NO MENU SE O NIVEL FOR MAIOR OU IGUAL A 2
                            echo '<li>
                            <a href="home.php?acao=ver-usuarios">
                                <i class="fas fa-user"></i>Usuários</a>
                            </li>';
                        }
                        ?>                   
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Procure por postagens" />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Adicionar Usuario</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Adicionar Postagem</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- PARA MOBILE-->
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar1">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<?php  if (FOTOUSUARIO == "") {echo $caminhofoto."embranco.png";} else {echo $caminhofoto.FOTOUSUARIO;} ?>" />
                        </div>
                        <h4 class="name"><?php echo $_SESSION['login'] ?></h4>
                        <a href="?sairadmin">Sair</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="home.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="home.php?acao=ver-postagens">
                                    <i class="fas fa-file"></i>Postagens</a>
                            </li>
                            
                            <?php if (NIVELACESSO >= 2){ // EXIBE A OPÇÃO USUARIO NO MENU SE O NIVEL FOR MAIOR OU IGUAL A 2
                            echo '<li>
                            <a href="home.php?acao=ver-usuarios">
                                <i class="fas fa-user"></i>Usuários</a>
                            </li>';
                            }
                        ?>   
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->