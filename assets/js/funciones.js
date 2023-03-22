$(document).ready(function(){
    /*=============================================================
        Si no se ha seleccionado ningun modulo me muestra el boton acceder
    =============================================================*/
    verModulo(0);
});


/*=============================================================
    Función para ver con los modulos (crear, copiar, consultar)
=============================================================*/
function verModulo(id){
    if(id == 0){
        $("#cuerpo").load("./vista/login.html");
    }else{
        $("#cuerpo").load("./vista/procesos/modulos.php");
    }
}


/*=============================================================
    Función para interactuar con los modulos (crear, copiar, consultar)
=============================================================*/
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


/*=============================================================
    Función ver la monedas y mostrarlas en un select
=============================================================*/
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

/*=============================================================
    Función buscar las actividades
=============================================================*/
function buscaActividad(){
    actividad = $("#actividad").val();
    $("#cardResult").show();
    if(actividad == ''){
        $("#resultado").html('<div clas="alert alert-danger"><strong>Error!!! El campo actividad no puede estar vacio</div>');
        return false;
    }
    $.ajax({
        "url": "./controlador/controladorActividad.php",
        "type": "POST",
        "data":{
            actividad:actividad,
        },
        "beforeSend": function() {
            //Mostrar el loading
            $("#resultado").html('<div class="alert alert-warning"><strong>Cargando información...</strong></div>');
        },
        "success": function(resultado){
            var data = JSON.parse(resultado);
            cadena = '';
            if(data.length){
                for(i = 0; i < data.length; i++){
                    cadena+=`
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="RadioActividad" id="RadioActividad" value="${data[i]['id']}">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ${data[i]['nombre']}
                        </label>
                    </div>
                    `
                }
            }else{
                cadena+= '<div class="alert alert-warning"><strong>Upss!!!</strong> No se encontraron coincidencias</div>';
            }
            $("#resultado").html(cadena);
            
            
        }
    });
}


/*=============================================================
    Función para interactuar con las pestañas información básica y cronograma
=============================================================*/
function pestanaForm1(id){
    if(id == 1){
        $("#infoBasica").show();
        $('#pestInfoBas').addClass('active');
        $("#infoCronograma").hide();
        $('#pestCrono').removeClass('active');
        
    }else if(id == 2){
        $("#infoBasica").hide();
        $('#pestInfoBas').removeClass('active');
        $("#infoCronograma").show();
        $('#pestCrono').addClass('active');
        
    }
}

/*=============================================================
    Función para aceptar solo número
=============================================================*/
function valideKey(evt){    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}


/*=============================================================
    Función para guardar el proceso
=============================================================*/
function guardarProceso(){
    
    /*=============================================================
        Restricciones vacias
    =============================================================*/
    if($("#objeto").val() == ''){//Objeto
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El campo objeto es obligatorio!',
            footer: ''
          });
          return false;
    }else if($("#descripcion").val() == ''){//Descripcion
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El campo descripcion es obligatorio!',
            footer: ''
          });
          return false;
    }else if($("#moneda").val() == '0'){//moneda
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El campo moneda es obligatorio!',
            footer: ''
          });
          return false;
    }else if($("#presupuesto").val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El campo presupuesto es obligatorio!',
            footer: ''
          });
          return false;
    }else if($("input[type=radio][name=RadioActividad]:checked").val() == null){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe seleccionar una actividad!',
            footer: ''
          });
          return false;
    }else if($("#fecIni").val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de inicio es obligatoria!',
            footer: ''
          });
          return false;
    }else if($("#horIni").val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La hora de inicio es obligatoria!',
            footer: ''
          });
          return false;
    }else if($("#fecFin").val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de final es obligatoria!',
            footer: ''
          });
          return false;
    }else if($("#horFin").val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La hora de final es obligatoria!',
            footer: ''
          });
          return false;
    }else{
        
        /*=============================================================
            Se capturan las variables
        =============================================================*/
        objeto = $("#objeto").val();
        descripcion = $("#descripcion").val();
        moneda = $("#moneda").val();
        presupuesto = $("#presupuesto").val();
        actividad = $("input[type=radio][name=RadioActividad]:checked").val();
        fecIni = $("#fecIni").val();
        horIni = $("#horIni").val();
        fecFin = $("#fecFin").val();
        horFin = $("#horFin").val();
        
        /*=============================================================
            Se envía mediante de AJAX
        =============================================================*/
        $.ajax({
            "url": "./controlador/controladorGuardaProceso.php",
            "type": "POST",
            "data":{
                objeto:objeto,
                descripcion:descripcion,
                moneda:moneda,
                presupuesto:presupuesto,
                actividad:actividad,
                fecIni:fecIni,
                horIni:horIni,
                fecFin:fecFin,
                horFin:horFin,
            },
            "beforeSend": function() {
                //Mostrar el loading
                $("#resultadoProceso").fadeIn(0);
                $('#guardaProceso').disabled = true;
                $("#resultadoProceso").html('<div class="alert alert-warning"><strong>Guardando información...</strong></div>');
            }
        }).done(function(resultado){
            
            /*=============================================================
                Se habilita el boton guardaProceso
            =============================================================*/
            $('#guardaProceso').disabled = false;
            
            /*=============================================================
                Si la respuesta es positiva envia un mensaje
            =============================================================*/
            if(resultado == 1){
                $("#resultadoProceso").fadeIn(0);
                $("#resultadoProceso").html('<div class="alert alert-success"><strong>Excelente!!!</strong> proceso guardado</div>');
                $(document).ready(function() {
                    setTimeout(function() {
                        $("#cuerpo").load('./vista/procesos/crear.html');
                    },3000);
                });
            }else{
                $("#resultadoProceso").fadeIn(0);
                $("#resultadoProceso").html('<div class="alert alert-danger"><strong>Error!!!</strong> No guardó ('+resultado+')</div>');
                $(document).ready(function() {
                    setTimeout(function() {                        
                        $("#resultadoProceso").fadeOut(1500);
                    },3000);
                });
                
            }
        });
    }
}



/*=============================================================
    Función para listar los estados y mostrarlos en un select
=============================================================*/
function selectEstado(){
    
    $.ajax({
        "url": "./controlador/controladorEstado.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        //Me muestra el archivo relacionado a modulo seleccionado        
        
        //Se crea una cadena para llenar el select
        cadena="<option value='0'>:::Seleccionar:::</option>"; 
        for(i=0; i < data.estados.length; i++){
            cadena+="<option value ='"+data.estados[i]['id']+"'>"+data.estados[i]['nombre']+"</option>";
        }     
        cadena+="<option value='0'>Todos</option>";    
        $("#cEstado").html(cadena);
    });  
    
}


