<?php
require_once '../modelo/modeloConexion.php';
require '../controlador/controlador.php';
require '../modelo/modelo.php';

if(isset($_FILES) AND !empty($_FILES)){
    
    /*======================================================
    ---------||Se crea una variable alfanumerica||----------
    ======================================================*/
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';      
    $cadena = substr(str_shuffle($permitted_chars), 0, 5);
    /*======================================================
    -------------||Se saca el tipo de archivo||--------------
    ======================================================*/
    $sep=explode('/',$_FILES['archivo']['type']);
    
    $tipo=$sep[1];
    /*======================================================
    -----------||Se crea el nombre de la imagen||-----------
    ======================================================*/
    $nombre = "Doc-".$cadena.".".$tipo;
    $path = "../vista/documentos/proceso".$_POST['identidad']."/".$nombre;
    $carpeta = "../vista/documentos/proceso".$_POST['identidad']."/";

    
    /*======================================================
    ------------||Se pregunta si es un PDF||-------------
    ======================================================*/
    if($tipo == "pdf"){//Si es un pdf se sube
        //Se crea la carpeta si no existe
        if(!file_exists($carpeta)){
            mkdir($carpeta, 0777, true);    
        }
        //echo $_FILES['archivo']["tmp_name"];
        move_uploaded_file($_FILES['archivo']["tmp_name"], $path);
        $inserDoc = ControlAdmin::ctrInsertDoc($_POST['identidad'],$_POST['titulo'],$_POST['descripcion'],$nombre);
        $respuesta = [
            "respuesta" => $inserDoc,
            "identidad" => $_POST['identidad'],
        ];
        echo json_encode($respuesta);
    }else{
        
        $devolvio = "El archivo no es un pdf ".$tipo;
        $respuesta = [
            "respuesta" => $devolvio,
            "identidad" => $_POST['identidad'],
        ];
        echo json_encode($respuesta);
    }
}else{
    $devolvio = "No hay documento";
    $respuesta = [
        "respuesta" => $devolvio,
        "identidad" => $_POST['identidad'],
    ];
    echo json_encode($respuesta);
}
        
