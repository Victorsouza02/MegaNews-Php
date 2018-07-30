<?php

// INICIO CADASTRO
if (isset($_POST['botaoregistrar'])) {
    include_once 'classes/Usuario.php';
    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setLogin($_POST['login']);

    $usuario->setSenha($_POST['pws']);
    $usuario->setConfsenha($_POST['confpws']);

    $erros = $usuario->verificarCadastro();
    $erros .= $usuario->validarFoto($_FILES['fotousuario']);

    if ($erros == "") {
        $ctrlcad = new CtrlUsuario();
        $resp = $ctrlcad->cadastrar($usuario);
        if ($resp) {
            echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!</strong> Cadastrado com sucesso
            </div>';
        } else {
            echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Falha ao cadastrar
            </div>';
        }
    } else {
        echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> '.$erros.'
            </div>';
    }
}

// FIM CADASTRO
?>