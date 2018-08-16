<?php

$ctrl = new CtrlPostagem();
$lanc = $ctrl->listarLancamentos();

foreach ($lanc as $key => $value) {
    $titulo = $lanc[$key]['nome'];
    $data = $lanc[$key]['data'];
    
    echo '<div class="row mb-3" >
            <div class="col-md-5">
                <p>'.date('d/m/Y', strtotime($data)).'</p>
            </div>
            <div class="col-md-7">
                <p>'.$titulo.'</p>
            </div>
        </div>';
}
?>