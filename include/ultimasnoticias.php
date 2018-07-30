<?php
$post_ultimasnoticias = new CtrlPostagem();
$ultimasnoticias = $post_ultimasnoticias->exibirUltimasNoticias(5);

foreach ($ultimasnoticias as $key => $value) {
    echo '<div class="col-md-12 mt-2 bg-noticia formapostagem">
    <h5>'.$ultimasnoticias[$key]['titulo'].'</h5>
</div>';
}
?>

