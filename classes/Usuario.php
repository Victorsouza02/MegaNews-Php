<?php

class Usuario {

    private $codUsuario;
    private $nome;
    private $login;
    private $senha;
    private $confsenha;
    private $idGrupo;
    private $foto;

    public function __construct() {
        $this->idGrupo = '2';
    }

    public function verificarCadastro() {
        $erros = "";
        if ($this->nome == '') {
            $erros .= "O campo nome está vazio.<br>";
        }
        if ($this->login == '') {
            $erros .= "O campo login está vazio.<br>";
        }
        if ($this->senha == "") {
            $erros .= "O campo senha está vazio.<br>";
        } else if (strlen($this->senha) < 8) {
            $erros .= "A senha tem menos de 4 caracteres.<br>";
        } elseif (strcmp($this->senha, $this->confsenha) != 0) {
            $erros .= "As senhas são diferentes.<br>";
        }
        return $erros;
    }

    public function validarFoto($foto) {
        $erros = array();
        $msg = "";
        if (!empty($foto["name"])) { // Se houver foto selecionada
            $largura = 400;
            $altura = 400;
            $tamanho = 500000;

            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) { // Verifica se é uma extensão de imagem --válida.
                $erros[0] = "Isso não é uma imagem<br>";
            }
            
            $dimensoes = getimagesize($foto["tmp_name"]); // Pega as dimensões da imagem

            if ($dimensoes[0] > $largura) { // Verifica se a largura da imagem é maior que a largura permitida 
                $erros[1] = "A largura da imagem não deve ultrapassar " . $largura . " pixels<br>";
            }

            if ($dimensoes[1] > $altura) { // Verifica se a altura da imagem é maior que a altura permitida 
                $erros[2] = "Altura da imagem não deve ultrapassar " . $altura . " pixels<br>";
            }

            if ($foto["size"] > $tamanho) {
                $erros[3] = "A imagem deve ter no máximo " . $tamanho . " bytes<br>";
            } // Verifica se o tamanho da imagem é maior que o tamanho permitido 
        } else {
            $erros[4] = "Imagem não foi selecionada<br>";
        }

        foreach ($erros as $key => $value) {
            if ($erros[$key] != "") {
                $msg .= $erros[$key];
            }
        }

        if ($msg == "") {
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); // Pega extensão da imagem 
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1]; // Gera um nome único para a imagem 
            // $caminho_imagem = $_SERVER['DOCUMENT_ROOT']."/upload/foto_perfil/" . $nome_imagem; // Para hospedar
            $caminho_imagem = $_SERVER['DOCUMENT_ROOT']."/upload/foto_perfil/" . $nome_imagem; // Caminho de onde ficará a imagem 
            move_uploaded_file($foto["tmp_name"], $caminho_imagem); // Faz o upload da imagem para seu respectivo caminho
            $this->foto = $nome_imagem;
            return $msg;
        } else {
            return $msg;
        }
    }

    public function verificarLogin() {
        $erros = "";

        if ($this->login == '') {
            $erros .= "O campo login está vazio.<br>";
        }
        if ($this->senha == "") {
            $erros .= "O campo senha está vazio.<br>";
        }
        return $erros;
    }

    public function verificarEdicao($dados_atuais) {
        $erros = 0;
        if ($this->nome == '') {
            $this->nome = $dados_atuais['nome'];
        }
        if ($this->login == '') {
            $this->login = $dados_atuais['login'];
        }
        if ($this->senha == '') {
            $this->senha = $dados_atuais['senha'];
        } else if (strlen($this->senha) < 8) {
            $erros++;
        }
        if (!($erros > 0)) {
            return true;
        } else {
            return false;
        }
    }

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function getConfsenha() {
        return $this->confsenha;
    }

    function setConfsenha($confsenha) {
        $this->confsenha = $confsenha;
    }

    function getIdGrupo() {
        return $this->idGrupo;
    }

    function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getLogado() {
        return $this->logado;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setLogado($logado) {
        $this->logado = $logado;
    }

}
