<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';


/*=============================================================
    Me consulta los estados
=============================================================*/
$rowEst = ControlAdmin::ctrVerEstado(null, "ver");

$respuesta = [
    "estados" => $rowEst,
];

/*=============================================================
    Envío los estados en formato JSON
=============================================================*/
echo json_encode($respuesta);
