<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

$rowArchivo = ControlAdmin::ctrverArchivo($_POST['id'], "verUno");



$fileName = $rowArchivo['archivo'];

$carpeta = "../vista/documentos/proceso".$rowArchivo['idProceso']."/";

if(file_exists($carpeta.$fileName)){//Se borra la imagen si ya existe
    unlink($carpeta.$fileName);
}
$eliminaArchivo = ControlAdmin::ctrEliminaArchivo($_POST['id']);
$respuesta = [
    "respuesta" => $eliminaArchivo,
    "identidad" => $rowArchivo['idProceso'],
];
echo json_encode($respuesta);