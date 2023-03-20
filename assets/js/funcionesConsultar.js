var tableProceso;
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

$(function(){
    $('#consultProceso').on('click', function (){
        
                
        idCerrada = $('#cidCerrada').val();
        objeto = $('#cObjeto').val();
        comprador = $('#cComprador').val();
        estado = $('#cEstado').val(); 

        tableProceso = $('#tabProcesos').DataTable( {
            "ordering":false,
            "paging": true,
            "searching": { "regex": true },
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            "pageLength": 10,
            "destroy":true,
            "async": true ,
            "processing": false,
            "ajax": {
                "url": "./controlador/controladorConsultProceso.php",
                "type": "POST",
                "data":{
                    idCerrada:idCerrada,
                    objeto:objeto,
                    comprador:comprador,
                    estado:estado,
                }
            },"columnDefs": [
                {
                    "targets": [ 1 ],
                    "visible": false
                },
                {
                    "targets": [ 6 ],
                    "visible": false
                },
                {
                    "targets": [ 8 ],
                    "visible": false
                }
            ],
            "columns": [
                { "data": "id" },
                { "data": "id" },
                { "data": "objeto" },
                { "data": "descripcion" },
                { "data": "fecIni"},
                { "data": "fecFin"},
                { "data": "idEstado" },
                { "data": "estado"},
                { "data": "objeto"},
                {"defaultContent":''},         
            ],
            "language":idioma_espanol,
           select: true
        } );



    });
});