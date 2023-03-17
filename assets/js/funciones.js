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

function selectActividad(){
    $.ajax({
        "url": "./controlador/controladorActividad.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
                
        //Se crea una cadena para llenar el select
        $("#actividad").html(data.actividades);
    });  
}



const formulario = document.querySelector('#formulario');
const boton = document.querySelector('#boton');
const resultado = document.querySelector('#resultado');
const filtrar = ()=>{
    resultado.innerHTML = '';
    //console.log(formulario.value);
    const texto = formulario.value.toLowerCase();
    for(let producto of productos){
        let nombre = producto.nombre.toLowerCase();
        if(nombre.indexOf(texto) !== -1){
            resultado.innerHTML +=`
            <div class="form-check">
                <input class="form-check-input" type="radio" id="RadioActividad" value="${producto.id}">
                <label class="form-check-label" for="flexRadioDefault1">
                    ${producto.nombre}
                </label>
            </div>
            `
        }
    }

    if(resultado.innerHTML === ''){
        resultado.innerHTML +=`
            Actividad no encontrada
            `
    }
}

boton.addEventListener('click', filtrar)
formulario.addEventListener('keyup', filtrar)