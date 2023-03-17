<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

$rowMod = ControlAdmin::ctrVerModulo($_POST['id'], 1,"verUno");

$respuesta = [
    "ruta" => $rowMod['ruta'],
];
echo json_encode($respuesta);
