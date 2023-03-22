$(document).ready(function(){
    /*=============================================================
        Me lista las monedas
    =============================================================*/
    selectMonedas();
});
/*=============================================================
    Función para la interación del menú
=============================================================*/
function pestanaForm2(id){
    if(id == 1){
        $("#infoBasica").show();
        $('#pestInfoBas').addClass('active');
        $("#infoCronograma").hide();
        $('#pestCrono').removeClass('active');
        $("#infoSubida").hide();
        $('#pestSubida').removeClass('active');
        
    }else if(id == 2){
        $("#infoBasica").hide();
        $('#pestInfoBas').removeClass('active');
        $("#infoCronograma").show();
        $('#pestCrono').addClass('active');
        $("#infoSubida").hide();
        $('#pestSubida').removeClass('active');        
    }else if(id == 3){
        $("#infoBasica").hide();
        $('#pestInfoBas').removeClass('active');
        $("#infoCronograma").hide();
        $('#pestCrono').removeClass('active');
        $("#infoSubida").show();
        $('#pestSubida').addClass('active');        
    }
}

/*=============================================================
    Función al dar click en el boton agregar
=============================================================*/
$(function(){
    $('#agregar').on('click', function (e){
           e.preventDefault(); 
        var paqueteDeDatos = new FormData();
        /*=============================================================
            Me pregunta si los campos archivo y titulo estan vacios
        =============================================================*/
        if($('#archivo')[0].files[0] == null ||
            $('#titulo').prop('value') == ''
        ){
            $("#responseImport").fadeIn(0);
            $("#responseImport").html('<div class="alert alert-danger"><strong>Error!!! los campos título y archivo son obligatorios</div>');
            $(document).ready(function() {
                setTimeout(function() {
                    $("#responseImport").fadeOut(1500);
                },3000);
            });
            return false;
        }
        /*=============================================================
            Se agrega los campos a la variable paqueteDeDatos
        =============================================================*/
        paqueteDeDatos.append('archivo', $('#archivo')[0].files[0]);
        paqueteDeDatos.append('titulo', $('#titulo').prop('value'));
        paqueteDeDatos.append('descripcion', $('#descripCont').prop('value'));
        paqueteDeDatos.append('identidad', $('#identidad').prop('value'));

        var destino = "./controlador/controlImportaDoc.php"; 
        /*=============================================================
            Se envía la información por medio de AJAX
        =============================================================*/
        $.ajax({
            url: destino,
            type: 'POST', 
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 
            beforeSend:function(resultado){
                /*=============================================================
                    Proceso de carga "loading"
                =============================================================*/
                $('#agregar').prop("disabled", true);
                $('#responseImport').html('<div class="alert alert-warning"><strong>Procesando!!!</strong></div>');
            },
            success: function(resultado){
                
                /*=============================================================
                    Se recibe la respuesta en formato JSON
                =============================================================*/
                var data = JSON.parse(resultado);
                
                /*=============================================================
                    Si la respuesta es verdadera me muestra el mensaje
                =============================================================*/
                if(data.respuesta == 1){
                    $("#responseImport").fadeIn(0);
                    $('#responseImport').html('<div class="alert alert-success"><strong>Excelente!!!</strong> el documento se subio exitosamente</div>');
                    $(document).ready(function() {
                        setTimeout(function() {
                            $("#responseImport").fadeOut(1500);
                        },3000);
                    });
                    
                    consulDoc(data.identidad);//Lista nuevamente los documentos
                }else{
                    
                    $("#responseImport").fadeIn(0);
                    $('#responseImport').html('<div class="alert alert-danger"><strong>Error!!!</strong> '+data.respuesta+'</div>');
                    $(document).ready(function() {
                        setTimeout(function() {
                            $("#responseImport").fadeOut(1500);
                        },3000);
                    });
                    
                }
                
                /*=============================================================
                    Se quita el disabled en el boton agregar
                =============================================================*/
                $('#agregar').prop("disabled", false);
            },
            error: function (){ 
                alert("Algo ha fallado.");
            }
        });
    });
});


/*=============================================================
    función para consultar los documentos
=============================================================*/
function consulDoc(identidad){
    $.ajax({
        "url": "./controlador/controladorConsultDoc.php",
        "type": "POST",
        "data":{
            identidad:identidad,
        },
        "beforeSend": function() {
        }
    }).done(function(resultado){
        var data = JSON.parse(resultado);
        $("#tbodyArchivo").html(data.tabla);
        
    });
}

/*=============================================================
    función para eliminar los documentos
=============================================================*/
function elimina(id){
    $.ajax({
        "url": "./controlador/controladorBorraArchivo.php",
        "type": "POST",
        "data":{
            id:id,
        },
        "beforeSend": function() {
        }
    }).done(function(resul){
        var data = JSON.parse(resul);
        
        /*=============================================================
            Si la respuesta es verdadera me muestra el mensaje
        =============================================================*/
        if(data.respuesta == 1){
            $("#responseImport").fadeIn(0);
            $('#responseImport').html('<div class="alert alert-success"><strong>Excelente!!!</strong> El archivo se eliminó correctamente</div>');
            $(document).ready(function() {
                setTimeout(function() {
                    $("#responseImport").fadeOut(1500);
                },3000);
            });
            
            consulDoc(data.identidad);
        }else{
            $("#responseImport").fadeIn(0);
            $('#responseImport').html('<div class="alert alert-danger"><strong>Error!!!</strong> '+resultado+'</div>');
            $(document).ready(function() {
                setTimeout(function() {
                    $("#responseImport").fadeOut(1500);
                },3000);
            });
            
        }
        
    });
}