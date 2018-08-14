<?php

class Postagem {

    private $autor;
    private $idPostagem;
    private $titulo;
    private $data;
    private $exibir;
    private $descricao;
    private $conteudo;
    private $categoria;
    private $foto;
    private $file_foto;

    function validarCampos() {
        $erros = array();
        $msg = "";

        if ($this->titulo == "") {
            $erros[0] = "Campo titulo está vazio<br>";
        }

        if ($this->descricao == "") {
            $erros[1] = "Campo descrição está vazio<br>";
        }

        if ($this->conteudo == "") {
            $erros[2] = "Campo conteúdo está vazio <br>";
        }

        foreach ($erros as $key => $value) {
            if ($erros[$key] != "") {
                $msg .= $erros[$key];
            }
        }

        return $msg;
    }

    public function verificarEdicao($nome_fa, $foto) {
        $erros = "";
        if ($this->titulo == '') {
            $erros .= "O campo TITULO está em branco";
        }

        if ($this->descricao == '') {
            $erros .= "O campo DESCRICAO está em branco";
        }

        if ($this->conteudo == '') {
            $erros .= "O campo CONTEUDO está em branco";
        }

        if (empty($foto["name"])) {
            $this->foto = $nome_fa;
        } else {
            $largura = 1280;
            $altura = 720;
            $tamanho = 500000;

            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) { // Verifica se é uma extensão de imagem --válida.
                $erros = "Isso não é uma imagem<br>";
            }

            $dimensoes = getimagesize($foto["tmp_name"]); // Pega as dimensões da imagem

            if ($dimensoes[0] > $largura) { // Verifica se a largura da imagem é maior que a largura permitida 
                $erros .= "A largura da imagem não deve ultrapassar " . $largura . " pixels<br>";
            }

            if ($dimensoes[1] > $altura) { // Verifica se a altura da imagem é maior que a altura permitida 
                $erros .= "Altura da imagem não deve ultrapassar " . $altura . " pixels<br>";
            }

            if ($foto["size"] > $tamanho) {
                $erros .= "A imagem deve ter no máximo " . $tamanho . " bytes<br>";
            } // Verifica se o tamanho da imagem é maior que o tamanho permitido 

            if ($erros == "") {
                unlink("../upload/postagens/$nome_fa");
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); // Pega extensão da imagem 
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1]; // Gera um nome único para a imagem 
                $caminho_imagem = "../upload/postagens/" . $nome_imagem; // Caminho de onde ficará a imagem 
                move_uploaded_file($foto["tmp_name"], $caminho_imagem); // Faz o upload da imagem para seu respectivo caminho
                $this->foto = $nome_imagem;
            }
        }

        return $erros;
    }

    function validarFoto($foto) {
        $erros = array();
        $msg = "";
        if (!empty($foto["name"])) { // Se houver foto selecionada
            $largura = 1280;
            $altura = 720;
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
            $caminho_imagem = "../upload/postagens/" . $nome_imagem; // Caminho de onde ficará a imagem 
            move_uploaded_file($foto["tmp_name"], $caminho_imagem); // Faz o upload da imagem para seu respectivo caminho
            $this->foto = $nome_imagem;
            return $msg;
        } else {
            return $msg;
        }
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function getFile_foto() {
        return $this->file_foto;
    }

    function setFile_foto($file_foto) {
        $this->file_foto = $file_foto;
    }

    function getIdPostagem() {
        return $this->idPostagem;
    }

    function setIdPostagem($idPostagem) {
        $this->idPostagem = $idPostagem;
    }

    function getAutor() {
        return $this->autor;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getData() {
        return $this->data;
    }

    function getExibir() {
        return $this->exibir;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getFoto() {
        return $this->foto;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setExibir($exibir) {
        $this->exibir = $exibir;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

}
