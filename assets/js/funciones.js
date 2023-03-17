$(document).ready(function(){
    verModulo(0);
});

function verModulo(id){
    if(id == 0){
        $("#cuerpo").load("./vista/login.html");
    }else{
        $("#cuerpo").load("./vista/compraVenta/modulos.php");
    }
}

function accion(id){    
    $.ajax({
        "url": "./controlador/controladorModulo.php",
        "type": "POST",
        "data":{
            id:id,
        },
    }).done(function(resp){
        var data = JSON.parse(resp);
        //Me muestra el archivo relacionado a modulo seleccionado
        $("#cuerpo").load(data.ruta);

    })    
}

function selectMonedas(){
    
    $.ajax({
        "url": "./controlador/controladorMoneda.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        //Me muestra el archivo relacionado a modulo seleccionado        
        
        //Se crea una cadena para llenar el select
        cadena="<option value='0'>:::Seleccionar:::</option>"; 
        for(i=0; i < data.monedas.length; i++){
            cadena+="<option value ='"+data.monedas[i]['id']+"'>"+data.monedas[i]['nombre']+"</option>";
        }        
        $("#moneda").html(cadena);
    });  
    
}



