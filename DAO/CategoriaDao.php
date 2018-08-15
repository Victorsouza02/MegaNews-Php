<?php

include_once 'Conexao.php';

class CategoriaDao {
    /* @var $conectar PDO */

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function cadastrar(Categoria $categoria) {
        try {
            $nome = $categoria->getNome();
            $sql = "INSERT INTO categoria VALUES('',:nome)";
            $conectar = $this->conexao->getCon();
            $cadastro = $conectar->prepare($sql);
            $cadastro->bindParam(":nome", $nome, PDO::PARAM_STR);
            $cadastro->execute();
        } catch (PDOException $ex) {
            echo "Erro : " . $ex->getMessage();
        }
    }

    public function deletar($idCat) {
        try {
            $sql = "DELETE FROM categoria WHERE idCategoria =:idCat";
            $conectar = $this->conexao->getCon();
            $deletar = $conectar->prepare($sql);
            $deletar->bindParam(":idCat", $idCat , PDO::PARAM_INT);
            $deletar->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex;
            return false;
        }
    }

    public function listarCategorias() {
        $sql = "SELECT * from categoria";
        $conectar = $this->conexao->getCon();
        $lista = $conectar->prepare($sql);
        $lista->execute();
        $categorias = $lista->fetchAll();
        return $categorias;
    }

    public function obterNomeCat($id) {
        $sql = "SELECT * from categoria WHERE idCategoria = :id";
        $conectar = $this->conexao->getCon();
        $lista = $conectar->prepare($sql);
        $lista->bindParam(":id", $id);
        $lista->execute();
        $categorias = $lista->fetch();
        return $categorias['nome'];
    }

}
