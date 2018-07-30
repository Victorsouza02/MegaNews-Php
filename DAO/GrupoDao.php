<?php

include_once 'Conexao.php';

class GrupoDao {
    /* @var $conectar PDO */

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function listarGrupos(){
        $sql = "SELECT * from grupo ORDER BY nivel DESC";
        $conectar = $this->conexao->getCon();
        $pesquisa = $conectar->prepare($sql);
        $pesquisa->execute();
        $lista = $pesquisa->fetchAll();
        return $lista;
    }
    
    
    public function obterNivelDeAcesso($idGrupo){
        $sql = "SELECT nivel FROM grupo  WHERE idGrupo=:idGrupo";
        $conectar = $this->conexao->getCon();
        $consultar = $conectar->prepare($sql);
        $consultar->bindParam(":idGrupo", $idGrupo, PDO::PARAM_INT);
        $consultar->execute();
        $res_row = $consultar->fetch();
        return $res_row;
    }
    

    
    
}
