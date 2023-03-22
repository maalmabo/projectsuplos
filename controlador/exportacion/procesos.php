<?php
require_once '../../modelo/modeloConexion.php';
require '../../controlador/controlador.php';
require '../../modelo/modelo.php';
require '../../libreria/phpSpreadsheet/vendor/autoload.php';
/*=============================================================
    Se consulta los procesos para pintarlos en el excel mediante la libreria phpSpreadsheet
=============================================================*/
$rowProceso = ControlAdmin::ctrConsultProceso($_GET['idCerrada'],$_GET['objeto'],$_GET['estado'],"ver");


use PhpOffice\PhpSpreadsheet\SpreadSheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new SpreadSheet();
$spreadsheet->getProperties()->setCreator('Suplos')->setTitle('Procesos');

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();

$spreadsheet->getDefaultStyle()->getFont()->setName('Tahoma');
$spreadsheet->getDefaultStyle()->getFont()->setSize(15);

/*=============================================================
    Se Asigna el tamaño a las celdas
=============================================================*/
$hojaActiva->getColumnDimension('A')->setWidth(5);
$hojaActiva->getColumnDimension('B')->setWidth(30);
$hojaActiva->getColumnDimension('C')->setWidth(40);
$hojaActiva->getColumnDimension('D')->setWidth(40);
$hojaActiva->getColumnDimension('E')->setWidth(5);
$hojaActiva->getColumnDimension('F')->setWidth(15);
$hojaActiva->getColumnDimension('G')->setWidth(17);
$hojaActiva->getColumnDimension('H')->setWidth(15);
$hojaActiva->getColumnDimension('I')->setWidth(15);

/*=============================================================
    Se crea el header de las exportación
=============================================================*/
$hojaActiva->setCellValue('A1', 'Id');
$hojaActiva->setCellValue('B1', 'Objeto');
$hojaActiva->setCellValue('C1', 'Actividad');
$hojaActiva->setCellValue('D1', 'Descripción');
$hojaActiva->setCellValue('E1', 'Moneda');
$hojaActiva->setCellValue('F1', 'Fecha Inicio');
$hojaActiva->setCellValue('G1', 'Hora Inicio');
$hojaActiva->setCellValue('H1', 'Fecha Cierre');
$hojaActiva->setCellValue('I1', 'Estado');



$spreadsheet->getDefaultStyle()->getFont()->setSize(12);
/*=============================================================
    Se pinta los datos consultados
=============================================================*/
$num = 2;
foreach ($rowProceso as $proceso) {
    $hojaActiva->setCellValue('A'.$num, $proceso['id']);
    $hojaActiva->setCellValue('B'.$num, $proceso['objeto']);
    $hojaActiva->setCellValue('C'.$num, $proceso['nombreProducto']);
    $hojaActiva->setCellValue('D'.$num, $proceso['descripcion']);
    $hojaActiva->setCellValue('E'.$num, $proceso['nombreMoneda']);
    $hojaActiva->setCellValue('F'.$num, $proceso['fecIni']);
    $hojaActiva->setCellValue('G'.$num, $proceso['horIni']);
    $hojaActiva->setCellValue('H'.$num, $proceso['fecFin']);
    $hojaActiva->setCellValue('I'.$num, $proceso['estado']);
    $num++;
}

// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="procesos.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');


