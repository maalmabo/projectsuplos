
/*=============================================================
    Se crea el idioma español para el datatable
=============================================================*/
var idioma_espanol = {
    select: {
    rows: "%d fila seleccionada"
    },
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
    "sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
    "sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "<b>Cargando Informacion...</b>",
    "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
    },
    "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
/*=============================================================
    Función para consultar los procesos por medio del filtro
=============================================================*/
function filtrar(){
    idCerrada = $('#cidCerrada').val();
    objeto = $('#cObjeto').val();
    estado = $('#cEstado').val(); 


        $.ajax({
            "url": "./controlador/controladorConsultProceso.php",
            "type": "POST",
            "data":{
                idCerrada:idCerrada,
                objeto:objeto,
                estado:estado,
            },
            "beforeSend": function() {
                //Mostrar el loading
                $('#consultProceso').disabled = true;
                $("#reponseConsult").html('<tr><td colspan="9"><div class="alert alert-warning"><strong>Consultando información...</strong></div></td></tr>');
            }
        }).done(function(resultado){
            var data = JSON.parse(resultado);
            $('#consultProceso').disabled = false;
            $("#numProceso").html('Número de procesos / eventos listados: <strong>'+data.cantidad+'</strong>');
            $("#reponseConsult").html(data.tabla);
            
        });
}

/*=============================================================
    Función para publicar el proceso
=============================================================*/
function publicar(identidad){
    var estado = 2;
    $.ajax({
        "url": "./controlador/controladorCambiaEstado.php",
        "type": "POST",
        "data":{
            estado:estado,
            identidad:identidad,
        }
    }).done(function(resp){
        console.log(resp);
        if (resp == 1) {
            $("#ConsultaMensaje").fadeIn(0);
            $("#ConsultaMensaje").html('<div class="alert alert-success">El proceso se publicó</div>');
            $(document).ready(function() {
				setTimeout(function() {
					$("#ConsultaMensaje").fadeOut(1500);
				},3000);
			});
        }else{
            $("#ConsultaMensaje").fadeIn(0);
            $("#ConsultaMensaje").html('<div class="alert alert-danger">El proceso no se publicó</div>'+resp);
            $(document).ready(function() {
				setTimeout(function() {
					$("#ConsultaMensaje").fadeOut(1500);
				},3000);
			});
        }
        
        
        filtrar();
    });  
}

/*=============================================================
    Función subir los archivos
=============================================================*/
function subeDocumentacion(identidad){
    $("#cuerpo").load('./vista/procesos/subeDocumentacion.html');
    llenaInformacion(identidad);
}

/*=============================================================
    Función para llenar los campos de información básica y cronograma
=============================================================*/
function llenaInformacion(identidad){
    $.ajax({
        "url": "./controlador/controladorVerProceso.php",
        "type": "POST",
        "data":{
            identidad:identidad,
        }
    }).done(function(resp){
        data = JSON.parse(resp);
        console.log(data.idMoneda);
        $("#objeto").val(data.objeto);
        $("#descripcion").val(data.descripcion);
        $('#moneda option:eq(2)').prop('selected', true);
        $("#presupuesto").val(data.presupuesto);
        $("#fecIni").val(data.fecIni);
        $("#horIni").val(data.horIni);
        $("#fecFin").val(data.fecFin);
        $("#horFin").val(data.horFin);
        $("#identidad").val(identidad);

        consulDoc(identidad);
        
    });
}
/*=============================================================
    Función para la exportación de excel
=============================================================*/
function exportarExcel(){

    idCerrada = $('#cidCerrada').val();
    objeto = $('#cObjeto').val();
    estado = $('#cEstado').val();   

    window.open('./controlador/exportacion/procesos.php?idCerrada='+idCerrada+'&objeto='+objeto+'&estado='+estado, '_blank');

}



