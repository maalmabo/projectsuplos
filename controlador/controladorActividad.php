<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';



$rowProd = ControlAdmin::ctrVerProducto(null, "ver");

//Creamos un json
$respuesta = [
    "actividades" => $rowProd,
];
echo json_encode($respuesta);
