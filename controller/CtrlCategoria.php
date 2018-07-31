<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/DAO/CategoriaDao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/Categoria.php";


class CtrlCategoria {
    
    public function cadastrar(Categoria $categoria) {
        $dao = new CategoriaDao();
        $dao->cadastrar($categoria);
    }
    
    public function deletar($idCat) {
        $dao = new CategoriaDao();
        $dao->deletar($idCat);
    }
    
    public function listarCategorias(){
        $dao = new CategoriaDao();
        $categorias =$dao->listarCategorias();
        return $categorias;
    }
    
    public function obterNomeCat($id){
        $dao = new CategoriaDao();
        $nome = $dao->obterNomeCat($id);
        return $nome;
    }
}
