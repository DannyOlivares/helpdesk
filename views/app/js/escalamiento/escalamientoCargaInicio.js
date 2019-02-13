function cargarTabla(tipo){
    //busca el elemento h3 y lo vacia
    $("#home").find("h3").text("");
    if ($('#t1').hasClass("dataTable")) {
        //nombre de la clase a buscar
        $('#t1').dataTable().fnDestroy();
    }
    $("#t1 tbody").remove();
    $("#t1 thead th").remove();

    switch (tipo) {
        case 'gestionada':

            $("#home").find("h3").text("Detalle Gestionadas");
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad");
            $.each(cols, function (index, value) {
                $("#t1").find("thead > tr").append("<th>"+value+"</th>");
            });

            $("#t1").dataTable({
                "ajax": {

                    "url": "api/tablaGestionada",
                    "type": "POST"
                },
                    "language"          : {
                    "search"            : "Buscar:",
                    "zeroRecords"       : "No hay datos para mostrar",
                    "info"              : "Mostrando _END_ Registros, de un total de _TOTAL_ ",
                    "loadingRecords"    : "Cargando...",
                    "processing"        : "Procesando...",
                    "infoEmpty"         : "No hay entradas para mostrar",
                    "lengthMenu"        : "Mostrar _MENU_ Filas",

                    "paginate"          : {
                    "first"             : "Primera",
                    "last"              : "Ultima",
                    "next"              : "Siguiente",
                    "previous"          : "Anterior"
                    }
                },
                    "autoWidth"         : true,
                    "scrollX"           : true,
                    "bSort"             : false,
                    "bInfo"             : false,
                    "iDisplayLength"    : 8,
                    "pagingType"        : "full_numbers",
                    "dom"                 : 'Bfrtip',
                    "buttons"             : [
                        {
                            extend: 'excel',
                            text: ''
                        }
                    ]
            });
        break;

        case 'pendiente':
            $("#home").find("h3").text("Detalle Pendientes");
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad");
            $.each(cols, function (index, value) {
                $("#t1").find("thead > tr").append("<th>"+value+"</th>");
            });
            $("#t1").dataTable({
                "ajax": {
                    "url": "api/tablaPendientes",
                    "type": "POST"
                },
                    "language"          : {
                    "search"            : "Buscar:",
                    "zeroRecords"       : "No hay datos para mostrar",
                    "info"              : "Mostrando _END_ Registros, de un total de _TOTAL_ ",
                    "loadingRecords"    : "Cargando...",
                    "processing"        : "Procesando...",
                    "infoEmpty"         : "No hay entradas para mostrar",
                    "lengthMenu"        : "Mostrar _MENU_ Filas",

                    "paginate"          : {
                    "first"             : "Primera",
                    "last"              : "Ultima",
                    "next"              : "Siguiente",
                    "previous"          : "Anterior"
                    }
                },
                    "autoWidth"         : true,
                    "scrollX"           : true,
                    "bSort"             : false,
                    "bInfo"             : false,
                    "iDisplayLength"    : 8,
                    "pagingType"        : "full_numbers",
                    "dom"                 : 'Bfrtip',
                    "buttons"             : [
                        {
                            extend: 'excel',
                            text: ''
                        }
                    ]
            });
        break;

        case 'seguimiento':

            $("#home").find("h3").text("Detalle Seguimiento");
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad");
            $.each(cols, function (index, value) {
                $("#t1").find("thead > tr").append("<th>"+value+"</th>");
            });
            $("#t1").dataTable({
                "ajax": {
                    "url": "api/tablaAsignadas",
                    "type": "POST"
                },
                    "language"          : {
                    "search"            : "Buscar:",
                    "zeroRecords"       : "No hay datos para mostrar",
                    "info"              : "Mostrando _END_ Registros, de un total de _TOTAL_ ",
                    "loadingRecords"    : "Cargando...",
                    "processing"        : "Procesando...",
                    "infoEmpty"         : "No hay entradas para mostrar",
                    "lengthMenu"        : "Mostrar _MENU_ Filas",

                    "paginate"          : {
                    "first"             : "Primera",
                    "last"              : "Ultima",
                    "next"              : "Siguiente",
                    "previous"          : "Anterior"
                    }
                },
                    "autoWidth"         : true,
                    "scrollX"           : true,
                    "bSort"             : false,
                    "bInfo"             : false,
                    "iDisplayLength"    : 8,
                    "pagingType"        : "full_numbers",
                    "dom"               : 'Bfrtip',
                    "buttons"           : [
                        {
                            extend: 'excel',
                            text: ''
                        }
                    ]
            });
        break;

        case 'finalizadaHoy':
            $("#home").find("h3").text("Detalle Finalizadas Hoy");
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad");
            $.each(cols, function (index, value) {
                $("#t1").find("thead > tr").append("<th>"+value+"</th>");
            });
            $("#t1").dataTable({
                "ajax": {
                    "url": "api/actividadesFinalizadasHoy",
                    "type": "POST"
                },
                    "language"          : {
                    "search"            : "Buscar:",
                    "zeroRecords"       : "No hay datos para mostrar",
                    "info"              : "Mostrando _END_ Registros, de un total de _TOTAL_ ",
                    "loadingRecords"    : "Cargando...",
                    "processing"        : "Procesando...",
                    "infoEmpty"         : "No hay entradas para mostrar",
                    "lengthMenu"        : "Mostrar _MENU_ Filas",

                    "columns":[
                        {"data"         : "nombre"},
                        {"defaultContent": "<button>Editar</button>"}
                    ],

                    "paginate"          : {
                    "first"             : "Primera",
                    "last"              : "Ultima",
                    "next"              : "Siguiente",
                    "previous"          : "Anterior"
                    }
                },
                    "autoWidth"         : true,
                    "scrollX"           : true,
                    "bSort"             : false,
                    "bInfo"             : false,
                    "iDisplayLength"    : 8,
                    "pagingType"        : "full_numbers",
                    "dom"               : 'Bfrtip',
                    "buttons"           : [
                        {
                            extend: 'excel',
                            text: ''
                        }
                    ]
            });
        break;

        default:
            break;
    }
}

$( window ).on( "load", function() {
    cargarTabla("gestionada");
  });