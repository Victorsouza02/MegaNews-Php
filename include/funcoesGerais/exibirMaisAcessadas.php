<?php
$caminho_foto = "upload/postagens/";
$ctrl_postagem = new CtrlPostagem();
$maisacessadas = $ctrl_postagem->exibirMaisAcessadas(2);

foreach ($maisacessadas as $key => $value) {
    $idpost = $maisacessadas[$key]['idPostagem'];
    echo '<div class="col-md-12 pb-1 px-0" style="position: relative;">
                        <img src="' . $caminho_foto . $maisacessadas[$key]['foto'] . '" class="w-100" style="max-height:257px">
                        <div class="bottom-right fontebranca w-100"><h5 class="text-center"><a href="index.php?post='.$idpost.'#postagem">' . $maisacessadas[$key]['titulo'] . '</a></h5></div>
                    </div>';
}
?>