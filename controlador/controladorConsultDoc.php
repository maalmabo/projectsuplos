<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

$rowDoc = ControlAdmin::ctrConsultDoc($_POST['identidad'],"ver");
$htmlTabla = "";
$num = 0;
foreach ($rowDoc as $doc) {
    $htmlTabla.= '
    <tr>
        <td>'.$doc['titulo'].'</td>
        <td>'.$doc['descripcion'].'</td>
        <td><a href="./vista/documentos/proceso'.$_POST['identidad'].'/'.$doc['archivo'].'" target="_blank">'.$doc['archivo'].'</a></td>
        <td>
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-danger btn-sm" onclick="elimina(';
        $htmlTabla.= "'".$doc['id']."'";
        $htmlTabla.= ')">X</button>
            </div>
        </td>
    </tr>';
    $num++;
}

$respuesta = [
    "tabla" => $htmlTabla,
    "cantidad" => $num,
];
echo json_encode($respuesta);

