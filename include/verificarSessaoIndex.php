<?php
if(isset($_SESSION['login'])){
    include_once 'include/constantes.php';
    include_once 'views/index/topo_logado.php';
    include_once 'deslogarUsuario.php';

} else {
    include_once 'views/index/topo_padrao.html';
    include_once 'include/loginUsuario.php';
    include_once 'include/cadastroUsuario.php';
}
?>