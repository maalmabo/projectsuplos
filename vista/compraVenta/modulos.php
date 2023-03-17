<?php
require_once '../../modelo/modeloConexion.php';
require '../../controlador/controlador.php';
require '../../modelo/modelo.php';

$rowMod = ControlAdmin::ctrVerModulo(null, 1,"ver");
$html = '
    <div class="row justify-content-center mt-4">';
foreach ($rowMod as $modulo) {
    $html.= '    
        <div class="col-3">
            <div class="d-grid gap-2">
                <button class="btn btn-primary" onclick="accion('.$modulo['id'].')">'.$modulo['descripcion'].'</button>
            </div>
            
        </div>';
}
$html.= '    
    </div>';

echo  $html;