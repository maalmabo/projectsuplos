<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';



/*=============================================================
    Consulta los productos
=============================================================*/
$rowProd = ControlAdmin::ctrVerProducto($_POST['actividad'], "ver");

//Creamos un json
//$respuesta = [
//    "actividades" => $rowProd,
//];

/*=============================================================
    Se envía en formato JSON
=============================================================*/
echo json_encode($rowProd);
