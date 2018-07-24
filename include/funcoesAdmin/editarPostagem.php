<?php
// VERIFICAR NIVEL DE ACESSO
if(NIVELACESSO >= 1){
$ctrlpostagem_editar = new CtrlPostagem();
$dadospost_atual = $ctrlpostagem_editar->dadosPostagemById($_GET['id']);
$titulo_atual = $dadospost_atual["titulo"];
$foto_atual = $dadospost_atual["foto"];
$descricao_atual = $dadospost_atual["descricao"];
$texto_atual = $dadospost_atual["texto"];
$caminho_img = "../upload/postagens/";

if(isset($_POST['editarpostagem'])){
    include_once '../classes/Postagem.php';
    $post_model = new Postagem();
    $post_model->setIdPostagem($_GET['id']);
    $post_model->setTitulo($_POST['titulo']);
    $post_model->setDescricao($_POST['descricao']);
    $post_model->setExibir($_POST['exibir']);
    $post_model->setConteudo($_POST['texto']);
    $res_post_edit = $post_model->verificarEdicao($dadospost_atual, $_FILES['foto']);
    
    if($res_post_edit == ""){
        $ctrl_post_edit = new CtrlPostagem();
        $ctrl_post_edit->editar($post_model);
            echo '<div class = "alert alert-success">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>Sucesso!</strong> Postagem editada com sucesso
            </div>';
            
            echo "<script>";
            echo 'setTimeout(function(){ window.location.href = "home.php?acao=ver-postagens"; }, 2000);';
            echo "</script>";
    } else {
        echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!<br></strong> '.$res_post_edit.'
            </div>';
    }
}
} else {
   echo '<div class = "alert alert-danger">
            <button type = "button" class = "close" data-dismiss = "alert">&times;
            </button>
            <strong>ERRO!</strong> Sem permissão!
            </div>';
}

?>

