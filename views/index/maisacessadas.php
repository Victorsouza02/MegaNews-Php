<?php

$caminho_foto = "upload/postagens/";
$ctrl_postagem = new CtrlPostagem();
$maisacessadas = $ctrl_postagem->exibirMaisAcessadas(2);

foreach ($maisacessadas as $key => $value) {
    echo '<div class="col-md-12 py-1 px-0" style="position: relative;">
                        <img src="' . $caminho_foto . $maisacessadas[$key]['foto'] . '" class="w-100">
                        <div class="bottom-right fontebranca w-100"><h5 class="text-center">' . $maisacessadas[$key]['titulo'] . '</h5></div>
                    </div>';
}
?>

