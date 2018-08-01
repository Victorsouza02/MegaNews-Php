<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/Usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/DAO/UsuarioDao.php";

class CtrlUsuario {

    public function login(Usuario $user) {
        $user_dao = new UsuarioDao();
        $resposta = $user_dao->login($user);
        return $resposta; // RETORNA TRUE OU FALSE (SE UM USUARIO FOI ENCONTRADO)
    }

    public function cadastrar(Usuario $user) {
        $user_dao = new UsuarioDao;
        $resposta = $user_dao->cadastrar($user);
        return $resposta;
    }

    public function editar(Usuario $user) {
        $user_dao = new UsuarioDao();
        $resposta = $user_dao->editar($user);
        return $resposta;
    }
    
    public function editarFoto(Usuario $user) {
        $user_dao = new UsuarioDao();
        $resposta = $user_dao->editarFoto($user);
        return $resposta;
    }

    public function deletar($id) {
        $user_dao = new UsuarioDao();
        $resposta = $user_dao->deletar($id);
        return $resposta;
    }
    
    public function numUsuarios(){
        $dao = new UsuarioDao();
        $num = $dao->numUsuarios();
        return $num;
    }

    public function listarUsuarios() {
        $lista = new UsuarioDao();
        $lista_users = $lista->listarUsuarios();
        return $lista_users; // RETORNA UM ARRAY COM UMA LISTA DE USUARIOS
    }

    public function buscar($dados) {
        $lista = new UsuarioDao();
        $lista_users = $lista->buscar($dados);
        return $lista_users;
    }

    public function isExistente($login){
        $dao = new UsuarioDao();
        $resp = $dao->isExistente($login);
        return $resp;
    }

    public function dadosUsuarioByLogin(Usuario $user) {
        $user_dao = new UsuarioDao();
        $dados = $user_dao->pegarDadosUsuarioByLogin($user);
        return $dados; // RETORNA O ARRAY COM OS DADOS DE UM USUARIO ESPECÍFICO
    }

    public function dadosUsuarioById($id) {
        $user_dao = new UsuarioDao();
        $dados = $user_dao->pegarDadosUsuarioById($id);
        return $dados; // RETORNA O ARRAY COM OS DADOS DE UM USUARIO ESPECÍFICO
    }

    public function obterIdGrupoAtual($idUsuario) {
        $dao = new UsuarioDao();
        $id = $dao->obterIdGrupoAtual($idUsuario);
        return $id['idGrupo'];
    }

    public function obterNiveldeAcesso($idUsuario) {
        $dao = new UsuarioDao();
        $id = $dao->obterNivelDeAcesso($idUsuario);
        return $id['nivel'];
    }
    
    public function obterNomeGrupo($idUsuario) {
        $dao = new UsuarioDao();
        $id = $dao->obterNomeGrupo($idUsuario);
        return $id['nome'];
    }
    
    public function obterIdUsuario($login) {
        $dao = new UsuarioDao();
        $id = $dao->obterIdUsuario($login);
        return $id['idUsuario'];
    }
    
    public function obterFotoUsuario($idUsuario) {
        $dao = new UsuarioDao();
        $id = $dao->obterFotoUsuario($idUsuario);
        return $id['foto'];
    }

}
