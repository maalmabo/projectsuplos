<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

$rowPro = ControlAdmin::ctrverProceso($_POST['identidad'], "verUno");
$estado = $_POST['estado'];
if($rowPro['fecFin'] <= date("Y-m-d")){//Si la fecha fin es menor o igual a la actual automaticamente pasa a estado evaluación
    $estado = 4;
}else if($rowPro['fecIni'] <= date("Y-m-d")){//Si la fecha inicio es menor o igual a la fecha actual automaticamente pasa a estado publicado
    $estado = 3;
}
$actProceso = ControlAdmin::ctrCambiaEstado($estado, $_POST['identidad']);

echo $actProceso;