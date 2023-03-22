<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';
/*=============================================================
    Se consulta el proceso
=============================================================*/
$rowPro = ControlAdmin::ctrverProceso($_POST['identidad'], "verUno");
/*=============================================================
    Se envían los datos en formato JSON
=============================================================*/
echo json_encode($rowPro);