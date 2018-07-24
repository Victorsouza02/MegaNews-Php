<?php

class Conexao {
    // BANCO LOCAL
    private $usuario = "root";
    private $senha = "";
    private $caminho = "localhost";
    private $banco = "MegaNews";
    private $con; 
    
    /* private $usuario = "1336645";
    private $senha = "14782008";
    private $caminho = "localhost";
    private $banco = "1336645";
    private $con; CONECTAR AO BANCO EXTERNO */
    
    public function __construct() {
        try{
        $this->con = new PDO("mysql:host=$this->caminho;dbname=$this->banco", "$this->usuario" , "$this->senha");
        $this->con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
    }
    
    public function getCon(){
        return $this->con;
    }
}
