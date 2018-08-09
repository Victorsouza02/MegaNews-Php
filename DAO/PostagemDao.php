<?php

include_once 'Conexao.php';

class PostagemDao {
    /* @var $conectar PDO */

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function cadastrar(Postagem $post) {
        try {
            $sql = "INSERT INTO postagem (titulo,descricao,texto,foto,data,exibir,idUsuario,idCategoria) VALUES (:titulo, :descricao, :texto,:foto, :data, :exibir, :idUsuario, :idCat)";
            $conectar = $this->conexao->getCon();
            $inserir = $conectar->prepare($sql);
            $titulo = $post->getTitulo();
            $descricao = $post->getDescricao();
            $texto = $post->getConteudo();
            $foto = $post->getFoto();
            $data = $post->getData();
            $idCat = $post->getCategoria();
            $exibir = $post->getExibir();
            $idUsuario = $post->getAutor();
            $inserir->bindParam(":titulo", $titulo, PDO::PARAM_STR);
            $inserir->bindParam(":descricao", $descricao, PDO::PARAM_STR);
            $inserir->bindParam(":texto", $texto, PDO::PARAM_STR);
            $inserir->bindParam(":foto", $foto, PDO::PARAM_STR);
            $inserir->bindParam(":data", $data, PDO::PARAM_STR);
            $inserir->bindParam(":exibir", $exibir, PDO::PARAM_STR);
            $inserir->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
            $inserir->bindParam(":idCat", $idCat, PDO::PARAM_INT);
            $inserir->execute();
            return true;
        } catch (PDOException $ex) {
            echo "Erro : " . $ex;
            return false;
        }
    }

    public function editar(Postagem $post) {
        try {
            $idPostagem = $post->getIdPostagem();
            $titulo = $post->getTitulo();
            $foto = $post->getFoto();
            $exibir = $post->getExibir();
            $descricao = $post->getDescricao();
            $texto = $post->getConteudo();
            $idCat = $post->getCategoria();
            $sql = "UPDATE postagem SET titulo= :titulo,foto = :foto, exibir = :exibir, descricao=:descricao, texto=:texto , idCategoria=:idCat WHERE idPostagem = :idPostagem";
            $conectar = $this->conexao->getCon();
            /* @var $conectar PDO */
            $editar = $conectar->prepare($sql);
            $editar->bindParam(":titulo", $titulo);
            $editar->bindParam(":foto", $foto);
            $editar->bindParam(":exibir", $exibir);
            $editar->bindParam(":descricao", $descricao);
            $editar->bindParam(":texto", $texto);
            $editar->bindParam(":idPostagem", $idPostagem);
            $editar->bindParam(":idCat", $idCat);
            $editar->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function deletar($idPostagem) {
        try {
            $sql = "DELETE FROM postagem WHERE idPostagem =:idPostagem";
            $conectar = $this->conexao->getCon();
            $deletar = $conectar->prepare($sql);
            $deletar->bindParam(":idPostagem", $idPostagem);
            $deletar->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex;
            return false;
        }
    }

    public function buscar($dados) {
        try {
            $sql = "SELECT * from postagem WHERE titulo LIKE ?";
            $conectar = $this->conexao->getCon();
            $buscarPostagem = $conectar->prepare($sql);
            $buscarPostagem->execute(array("$dados%"));
            $postagem = $buscarPostagem->fetchAll();
        } catch (PDOException $ex) {
            echo "Erro : " . $ex->getMessage();
        } finally {
            $conectar = null;
            return $postagem;
        }
    }

    public function exibirUltimasNoticias($limite) {
        $opcao = "S";
        $sql = "SELECT * FROM postagem WHERE exibir=:exibir ORDER BY idPostagem DESC  LIMIT :limite";
        $conectar = $this->conexao->getCon();
        $exibir = $conectar->prepare($sql);
        $exibir->bindParam(":exibir", $opcao);
        $exibir->bindParam(":limite", $limite, PDO::PARAM_INT);
        $exibir->execute();
        $resultado = $exibir->fetchAll();
        return $resultado;
    }

    public function addContagem($contagem_atual, $id) {
        $contagem = $contagem_atual + 1;
        $sql = "UPDATE postagem SET contagem = :contagem WHERE idPostagem = :idPostagem";
        $conectar = $this->conexao->getCon();
        $exibir = $conectar->prepare($sql);
        $exibir->bindParam(":contagem", $contagem);
        $exibir->bindParam(":idPostagem", $id);
        $exibir->execute();
    }

    public function listarPostagens() {
        $sql = "SELECT * from postagem";
        $conectar = $this->conexao->getCon();
        $listarPostagens = $conectar->prepare($sql);
        $listarPostagens->execute();
        $postagens = $listarPostagens->fetchAll();
        return $postagens;
    }

    public function numPostagens() {
        $sql = "SELECT * from postagem";
        $conectar = $this->conexao->getCon();
        $listarPostagens = $conectar->prepare($sql);
        $listarPostagens->execute();
        $numpostagens = $listarPostagens->rowCount();
        return $numpostagens;
    }

    public function listarUltimasPostagens($limite) {
        $sql = "SELECT * FROM postagem ORDER BY idPostagem DESC  LIMIT :limite";
        $conectar = $this->conexao->getCon();
        $exibir = $conectar->prepare($sql);
        $exibir->bindParam(":limite", $limite, PDO::PARAM_INT);
        $exibir->execute();
        $resultado = $exibir->fetchAll();
        return $resultado;
    }

    public function listarMaisAcessadas($limite) {
        $sql = "SELECT * FROM postagem ORDER BY contagem DESC  LIMIT :limite";
        $conectar = $this->conexao->getCon();
        $exibir = $conectar->prepare($sql);
        $exibir->bindParam(":limite", $limite, PDO::PARAM_INT);
        $exibir->execute();
        $resultado = $exibir->fetchAll();
        return $resultado;
    }

    public function paginacaoPostagem($inicio, $max_por_pag) {
        $opcao = "S";
        $sql = "SELECT * FROM postagem  WHERE exibir=:exibir ORDER BY idPostagem DESC  LIMIT :inicio,:max";
        $conectar = $this->conexao->getCon();
        $exibir = $conectar->prepare($sql);
        $exibir->bindParam(":inicio", $inicio, PDO::PARAM_INT);
        $exibir->bindParam(":exibir", $opcao, PDO::PARAM_STR);
        $exibir->bindParam(":max", $max_por_pag, PDO::PARAM_INT);
        $exibir->execute();
        $resultado = $exibir->fetchAll();
        return $resultado;
    }

    public function postagemPorCategoria($inicio, $max_por_pag, $idCategoria) {
        try {
            $opcao = "S";
            $sql = "SELECT * FROM postagem  WHERE exibir=:exibir AND idCategoria = :id ORDER BY idPostagem DESC LIMIT :inicio,:max";
            $conectar = $this->conexao->getCon();
            $exibir = $conectar->prepare($sql);
            $exibir->bindParam(":inicio", $inicio, PDO::PARAM_INT);
            $exibir->bindParam(":exibir", $opcao, PDO::PARAM_STR);
            $exibir->bindParam(":max", $max_por_pag, PDO::PARAM_INT);
            $exibir->bindParam(":id", $idCategoria, PDO::PARAM_INT);
            $exibir->execute();
            $resultado = $exibir->fetchAll();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $resultado;
    }

    public function postagemPorTitulo($inicio, $max_por_pag, $titulo) {
        try {
            $titulo = $titulo."%";
            $opcao = "S";
            $sql = "SELECT * FROM postagem  WHERE exibir=:exibir AND titulo LIKE :titulo ORDER BY idPostagem DESC LIMIT :inicio,:max";
            $conectar = $this->conexao->getCon();
            $exibir = $conectar->prepare($sql);
            $exibir->bindParam(":inicio", $inicio, PDO::PARAM_INT);
            $exibir->bindParam(":exibir", $opcao, PDO::PARAM_STR);
            $exibir->bindParam(":max", $max_por_pag, PDO::PARAM_INT);
            $exibir->bindParam(":titulo", $titulo , PDO::PARAM_STR);
            $exibir->execute();
            $resultado = $exibir->fetchAll();
        } catch (PDOException $ex) {
            echo "<script>alert('".$ex->getMessage()."')</script>";
        }
        return $resultado;
    }

    public function dadosPostagemById($id) {
        $sql = "SELECT * FROM postagem WHERE idPostagem=:id";
        $conectar = $this->conexao->getCon();
        $exibir = $conectar->prepare($sql);
        $exibir->bindParam(":id", $id, PDO::PARAM_INT);
        $exibir->execute();
        $resultado = $exibir->fetch();
        return $resultado;
    }

}
