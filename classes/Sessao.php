<?php

class Sessao {

    private $idUsuario;
    private $usuario;

    public function abrirSessao() {
        $_SESSION['idUsuario'] = $this->idUsuario;
        $_SESSION['login'] = $this->usuario;
    }

    public function encerrarSessao() {
        session_destroy();
        session_unset();
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function getUsuario() {
        return $this->usuario;
    }


    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


}
