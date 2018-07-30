<?php

include_once 'Conexao.php';

class UsuarioDao {
    /* @var $conectar PDO */
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    /**
     * @param Usuario $user
     * @return bool
     */
    public function login(Usuario $user) {
        $login = $user->getLogin();
        $senha = $user->getSenha();

        try {
            $sql = "SELECT * from usuario WHERE login=:login AND senha=:senha";
            $conectar = $this->conexao->getCon();
            $pesquisar = $conectar->prepare($sql);
            $pesquisar->bindParam(":login", $login, PDO::PARAM_STR);
            $pesquisar->bindParam(":senha", $senha, PDO::PARAM_STR);
            $pesquisar->execute();
            $num_rows = $pesquisar->rowCount();
            if ($num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Erro : " . $ex;
        }
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function cadastrar(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuario (nome,login,senha,foto,idGrupo) VALUES (:nome, :login, :senha, :foto, :id)";
            $conectar = $this->conexao->getCon();
            $inserir = $conectar->prepare($sql);
            $nome = $usuario->getNome();
            $login = $usuario->getLogin();
            $senha = $usuario->getSenha();
            $id = $usuario->getIdGrupo();
            $foto = $usuario->getFoto();
            $inserir->bindParam(":nome", $nome, PDO::PARAM_STR);
            $inserir->bindParam(":login", $login, PDO::PARAM_STR);
            $inserir->bindParam(":senha", $senha, PDO::PARAM_STR);
            $inserir->bindParam(":foto", $foto, PDO::PARAM_STR);
            $inserir->bindParam(":id", $id, PDO::PARAM_STR);
            $inserir->execute();
            return true;
        } catch (PDOException $ex) {
            echo "Erro : " . $ex;
            return false;
        }
    }

    public function deletar($idUsuario) {
        try {
            $sql = "DELETE FROM usuario WHERE idUsuario =:idUsuario";
            $conectar = $this->conexao->getCon();
            $deletar = $conectar->prepare($sql);
            $deletar->bindParam(":idUsuario", $idUsuario);
            $deletar->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex;
            return false;
        }
    }

    public function editar(Usuario $usuario) {
        try {
            $nome = $usuario->getNome();
            $login = $usuario->getLogin();
            $senha = $usuario->getSenha();
            $idUsuario = $usuario->getCodUsuario();
            $idGrupo = $usuario->getIdGrupo();
            $sql = "UPDATE usuario SET nome= :nome,login = :login, senha = :senha, idGrupo=:id WHERE idUsuario = :idUsuario";
            $conectar = $this->conexao->getCon();
            /* @var $conectar PDO */
            $editar = $conectar->prepare($sql);
            $editar->bindParam(":nome", $nome);
            $editar->bindParam(":login", $login);
            $editar->bindParam(":senha", $senha);
            $editar->bindParam(":idUsuario", $idUsuario);
            $editar->bindParam(":id", $idGrupo);
            $editar->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }
    
    public function editarFoto(Usuario $usuario) {
        try {
            $foto = $usuario->getFoto();
            $idUsuario = $usuario->getCodUsuario();
            $sql = "UPDATE usuario SET foto= :foto WHERE idUsuario = :idUsuario";
            $conectar = $this->conexao->getCon();
            /* @var $conectar PDO */
            $editar = $conectar->prepare($sql);
            $editar->bindParam(":foto", $foto , PDO::PARAM_STR);
            $editar->bindParam(":idUsuario", $idUsuario , PDO::PARAM_INT);
            $editar->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }
    
    public function numUsuarios(){
        $sql = "SELECT * from usuario";
        $conectar = $this->conexao->getCon();
        $listarUsuarios = $conectar->prepare($sql);
        $listarUsuarios->execute();
        $usuarios = $listarUsuarios->rowCount();
        return $usuarios;
    }
    
    public function listarUsuarios() {
        $sql = "SELECT * from usuario";
        $conectar = $this->conexao->getCon();
        $listarUsuarios = $conectar->prepare($sql);
        $listarUsuarios->execute();
        $usuarios = $listarUsuarios->fetchAll();
        return $usuarios;
    }

    public function buscar($dados) {
        $sql = "SELECT * from usuario WHERE nome LIKE ?";
        $conectar = $this->conexao->getCon();
        $listarUsuarios = $conectar->prepare($sql);
        $listarUsuarios->execute(array("%$dados%"));
        $usuarios = $listarUsuarios->fetchAll();
        return $usuarios;
    }


    public function pegarDadosUsuarioByLogin(Usuario $user) {
        $login = $user->getLogin();
        $senha = $user->getSenha();
        try {
            $sql = "SELECT * from usuario WHERE login=:login AND senha=:senha";
            $conectar = $this->conexao->getCon();
            $pesquisar = $conectar->prepare($sql);
            $pesquisar->bindParam(":login", $login, PDO::PARAM_STR);
            $pesquisar->bindParam(":senha", $senha, PDO::PARAM_STR);
            $pesquisar->execute();
            $resultado = $pesquisar->fetch();

            return $resultado;
        } catch (PDOException $ex) {
            echo "Erro : " . $ex;
        }
    }

    public function pegarDadosUsuarioById($id) {
        try {
            $sql = "SELECT * from usuario WHERE idUsuario=:id";
            $conectar = $this->conexao->getCon();
            $pesquisar = $conectar->prepare($sql);
            $pesquisar->bindParam(":id", $id, PDO::PARAM_STR);
            $pesquisar->execute();
            $resultado = $pesquisar->fetch();

            return $resultado;
        } catch (PDOException $ex) {
            echo "Erro : " . $ex;
        }
    }
    
     public function obterIdUsuario($login){
        $sql = "SELECT idUsuario FROM usuario WHERE login=:login";
        $conectar = $this->conexao->getCon();
        $consultar = $conectar->prepare($sql);
        $consultar->bindParam(":login", $login);
        $consultar->execute();
        $res_row = $consultar->fetch();
        return $res_row;
    }

    public function obterNivelDeAcesso($idUsuario){
        $sql = "SELECT grupo.nivel FROM usuario,grupo  WHERE usuario.idUsuario=:idUsuario AND usuario.idGrupo = grupo.idGrupo";
        $conectar = $this->conexao->getCon();
        $consultar = $conectar->prepare($sql);
        $consultar->bindParam(":idUsuario", $idUsuario);
        $consultar->execute();
        $res_row = $consultar->fetch();
        return $res_row;
    }
    
    public function obterIdGrupoAtual($idUsuario){
        $sql = "SELECT idGrupo FROM usuario WHERE idUsuario=:idUsuario";
        $conectar = $this->conexao->getCon();
        $consultar = $conectar->prepare($sql);
        $consultar->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $consultar->execute();
        $res_row = $consultar->fetch();
        return $res_row;
    }
    
    public function obterNomeGrupo($idUsuario){
        $sql = "SELECT grupo.nome FROM usuario,grupo WHERE usuario.idUsuario=:idUsuario AND usuario.idGrupo = grupo.idGrupo";
        $conectar = $this->conexao->getCon();
        $consultar = $conectar->prepare($sql);
        $consultar->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $consultar->execute();
        $res_row = $consultar->fetch();
        return $res_row;
    }
    
    public function obterFotoUsuario($idUsuario){
        $sql = "SELECT foto FROM usuario WHERE idUsuario=:idUsuario";
        $conectar = $this->conexao->getCon();
        $consultar = $conectar->prepare($sql);
        $consultar->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $consultar->execute();
        $res_row = $consultar->fetch();
        return $res_row;
    }


}
