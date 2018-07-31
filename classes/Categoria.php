<?php

class Categoria {
    private $nome;
    
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function verificarCampos() {
        $msg = "";
        if($this->nome == ""){
            $msg .= "Campo Nome está vazio.";
        }
        return $msg;
    }
}
