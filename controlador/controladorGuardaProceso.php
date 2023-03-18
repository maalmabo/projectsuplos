<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

date_default_timezone_set('America/Bogota');

$estado = 1;

$insertProceso = ControlAdmin::ctrGuardaProceso(
    $_POST['objeto'],
    $_POST['descripcion'],
    $_POST['moneda'],
    $_POST['presupuesto'],
    $_POST['actividad'],
    $_POST['fecIni'],
    $_POST['horIni'],
    $_POST['fecFin'],
    $_POST['horFin'],
    date("Y-m-d H:i:s"),
    $estado
);

//Creamos un json
//$respuesta = [
//    "actividades" => $rowProd,
//];
echo $insertProceso;