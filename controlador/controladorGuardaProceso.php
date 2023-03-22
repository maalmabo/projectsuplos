<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

/*=============================================================
    Configura la fecha y hora regional
=============================================================*/
date_default_timezone_set('America/Bogota');

/*=============================================================
    Se crea una variable aleatoria para guardarla en el campo identidad de la tabla proceso
=============================================================*/
$Random = uniqid();  

/*=============================================================
    El estado activo
=============================================================*/
$estado = 1;


/*=============================================================
    Se envia la petición al modelo controlador ctrGuardaProceso
=============================================================*/
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
    $estado,
    $Random
);

//Creamos un json
//$respuesta = [
//    "actividades" => $rowProd,
//];

/*=============================================================
    Se envía la respuesta del insert
=============================================================*/
echo $insertProceso;