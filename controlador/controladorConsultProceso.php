<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';




$rowProceso = ControlAdmin::ctrConsultProceso($_POST['idCerrada'],$_POST['objeto'],$_POST['comprador'],$_POST['estado'],"ver");
foreach ($rowProceso as $proceso) {
    $data['data'][] = $proceso;
}

if($data){
    echo json_encode($data);
}else {
    echo '{
        "sEcho": 1,
        "iTotalRecords": "0",
        "iTotalDisplayRecords": "0",
        "Data": []
    }';
}
