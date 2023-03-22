<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

/*=============================================================
    Se consulta los procesos para anexarlos a la tabla
=============================================================*/
$rowProceso = ControlAdmin::ctrConsultProceso($_POST['idCerrada'],$_POST['objeto'],$_POST['estado'],"ver");
$htmlTabla = "";
$num = 0;
foreach ($rowProceso as $proceso) {
    $htmlTabla.= '
    <tr>
        <td>'.$proceso['id'].'</td>
        <td>'.$proceso['objeto'].'</td>
        <td>'.$proceso['descripcion'].'</td>
        <td>'.$proceso['fecIni'].'</td>
        <td>'.$proceso['fecFin'].'</td>
        <td>'.$proceso['estado'].'</td>
        <td>';
    $htmlTabla.= '
            <div class="d-grid gap-2">';
    if($proceso['idEstado'] == 1){
        $htmlTabla.= '
                <button type="button" class="btn btn-primary btn-sm" onclick="publicar(';
        $htmlTabla.= "'".$proceso['identidad']."'";
        $htmlTabla.= ')">Publicar</button>';
    }
    $htmlTabla.= '
                <button type="button" class="btn btn-dark btn-sm" onclick="subeDocumentacion(';
        $htmlTabla.= "'".$proceso['identidad']."'";
        $htmlTabla.= ')">Documentación</button>
            </div>
        </td>
    </tr>';
    $num++;
}

$respuesta = [
    "tabla" => $htmlTabla,
    "cantidad" => $num,
];
/*=============================================================
    Se envían los datos en formato JSON
=============================================================*/
echo json_encode($respuesta);

