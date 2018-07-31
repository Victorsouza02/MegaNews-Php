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
            echo "Erro : ".$ex->getMessage();
        }
    }

}
