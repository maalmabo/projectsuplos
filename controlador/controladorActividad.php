<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

$html ="";

$rowProd = ControlAdmin::ctrVerProducto(null, "ver");
foreach ($rowProd as $prod) {
    $html.='<option value="'.$prod['id'].'">'.$prod['nombre'].'</option>';
}
//Creamos un json
$respuesta = [
    "actividades" => $html,
];
echo json_encode($respuesta);
