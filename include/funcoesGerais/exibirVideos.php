<?php

$ctrl = new CtrlPostagem();
$videos = $ctrl->listarVideos();

foreach ($videos as $key => $value) {
    $titulo = $videos[$key]['nome'];
    $url = $videos[$key]['url'];
    
    echo '<div class="col-md-4 px-2">
            <div class="row mb-3">
                <div class="col-12">
                    <iframe width="80%" height="250" style="display: block; margin: 0 auto;"src="'.$url.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="col-12">
                    <h3 class="text-center py-2">'.$titulo.'</h3>
                </div>
            </div>        
        </div>';
}
?>
