<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/DAO/CategoriaDao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/Categoria.php";


class CtrlCategoria {
    
    public function cadastrar(Categoria $categoria) {
        $dao = new CategoriaDao();
        $dao->cadastrar($categoria);
    }
}
