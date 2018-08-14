<?php
if(isset($_SESSION['login'])){
    include_once 'include/constantes.php';
    include_once 'include/funcoesUsuario/deslogarUsuario.php';
    include_once 'include/funcoesUsuario/alterarfoto.php';
} else {
    include_once 'include/funcoesUsuario/loginUsuario.php';
    include_once 'include/funcoesUsuario/cadastroUsuario.php';
}
?>