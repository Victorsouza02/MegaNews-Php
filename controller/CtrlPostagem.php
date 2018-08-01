<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/Postagem.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/DAO/PostagemDao.php";

class CtrlPostagem {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function cadastrar(Postagem $post) {
        $dao = new PostagemDao();
        $resposta = $dao->cadastrar($post);
        return $resposta;       
    }
    public function editar(Postagem $post){
        $dao = new PostagemDao();
        $resposta = $dao->editar($post);
        return $resposta;
    }
    
    public function deletar($idPostagem){
        $dao = new PostagemDao();
        $resposta = $dao->deletar($idPostagem);
        return $resposta;
    }
    public function numPostagens(){
        $dao = new PostagemDao();
        $num = $dao->numPostagens();
        return $num;
    }
    
    public function addContagem($contagem_atual,$id){
        $dao = new PostagemDao();
        $dao->addContagem($contagem_atual,$id);
    }
    
    public function listarPostagens() {
        $dao = new PostagemDao();
        $result = $dao->listarPostagens();
        return $result;
    }
    
    
    public function paginacaoPostagem($inicio,$max_por_pag) {
        $dao = new PostagemDao();
        $result = $dao->paginacaoPostagem($inicio, $max_por_pag);
        return $result;
    }
    
    public function postagemPorCategoria($inicio,$max_por_pag,$idCategoria) {
        $dao = new PostagemDao();
        $result = $dao->postagemPorCategoria($inicio, $max_por_pag, $idCategoria);
        return $result;
    }
    
    public function buscar($dados){
        $dao = new PostagemDao();
        $result = $dao->buscar($dados);
        return $result;
    }
    
    public function exibirPost(){
        $dao = new PostagemDao();
        $postagens = $dao->exibirPost();
        return $postagens;
    }
    
    public function exibirUltimasNoticias($limite){
        $dao = new PostagemDao();
        $ultimasnoticias = $dao->exibirUltimasNoticias($limite);
        return $ultimasnoticias;
    }
    
    public function exibirMaisAcessadas($limite){
        $dao = new PostagemDao();
        $maisacessadas = $dao->listarMaisAcessadas($limite);
        return $maisacessadas;
    }
    
    public function listarUltimasPostagens($limite) {
        $dao = new PostagemDao();
        $ultimasnoticias = $dao->listarUltimasPostagens($limite);
        return $ultimasnoticias;
    }
    
    public function dadosPostagemById($id) {
        $dao = new PostagemDao();
        $dados = $dao->dadosPostagemById($id);
        return $dados;
    }
    

}
