<?php
$caminho_foto = "upload/postagens/";
$ctrl_postagem = new CtrlPostagem();
$maisacessadas = $ctrl_postagem->exibirMaisAcessadas(3);

foreach ($maisacessadas as $key => $value) {
    $titulo = $maisacessadas[$key]['titulo'];
    $foto = $maisacessadas[$key]['foto'];
    $idpost = $maisacessadas[$key]['idPostagem'];
    echo '<div class="row mb-3" >
            <div class="col-md-4">
                <img src="'.$caminho_foto.$foto.'" class="w-100"/>
            </div>
            <div class="col-md-8">
                <p>'.$titulo.'</p>
            </div>
        </div>';
}
?>