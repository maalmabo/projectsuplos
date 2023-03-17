<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

$rowMon = ControlAdmin::ctrVerMoneda(null, 1, "ver");

$respuesta = [
    "monedas" => $rowMon,
];
echo json_encode($respuesta);
