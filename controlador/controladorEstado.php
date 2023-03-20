<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

$rowEst = ControlAdmin::ctrVerEstado(null, "ver");

$respuesta = [
    "estados" => $rowEst,
];
echo json_encode($respuesta);
