function agregarEscalamiento(){
    $.ajax({
      type: "POST",
      url: "api/agregarEscalamiento",
      data: $("#formAgregarEscalamiento").serialize(),
      success: function(json) {
        if (json.success == 1) {
          $.alert({
            icon: "fa fa-warning",
            title: "Actividad Creada Satisfactoriamente",
            content: json.message,
            type: "green",
            typeAnimated: true,
            autoClose: "ok|3000",
            buttons: {
              ok: function() {
                location.href = "escalamiento/escalamiento";
              }
            }
        });
      } else {
        $.alert({
          icon: "fa fa-warning",
          title: "Error al intentar crear actividad",
          content: json.message,
          type: "red",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {}
          }
      });
    }
    },
    error: function(xhr, status) {
      msg_box_alert(99, "title", xhr.responseText);
    }
  });
}

function crearEncargadoFiltrar(){
    $.ajax({
      type: "POST",
      url: "api/crearEncargadoFiltrar",
      data: $("#formAgregarEncargadoFiltrar").serialize(),
      success: function(json) {
        if (json.success == 1) {
          $.alert({
            icon: "fa fa-warning",
            title: "Encargado Creado Satisfactoriamente",
            content: json.message,
            type: "green",
            typeAnimated: true,
            autoClose: "ok|3000",
            buttons: {
              ok: function() {
                location.href = "escalamiento/escalamiento";
              }
            }
        });
    } else if (json.success == 0){
        $.alert({
          icon: "fa fa-warning",
          title: "Error al intentar crear encargado",
          content: json.message,
          type: "red",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {}
          }
      });
  }else if (json.success == 2){
        $.alert({
          icon: "fa fa-warning",
          title: "finalizar actividad",
          content: json.message,
          type: "red",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {
                location.href = "escalamiento/agregarEscalamientoNoCorresponde/"+json.idActv;
            }
          }
      });
    }
    else if (json.success == 3){
          $.alert({
            icon: "fa fa-warning",
            title: "agregar Actividad",
            content: json.message,
            type: "red",
            typeAnimated: true,
            autoClose: "ok|3000",
            buttons: {
              ok: function() {
                  location.href = "escalamiento/agregarEscalamiento/"+json.idActv;
              }
            }
        });
      }
    },
    error: function(xhr, status) {
      msg_box_alert(99, "title", xhr.responseText);
    }
  });
}

function agregarEscalamientoNoCorresponde(){
    $.ajax({
      type: "POST",
      url: "api/agregarEscalamientoNoCorresponde",
      data: $("#formAgregarEscalamientoNoCorresponde").serialize(),
      success: function(json) {
        if (json.success == 1) {
          $.alert({
            icon: "fa fa-warning",
            title: "Actividad Cerrada Satisfactoriamente",
            content: json.message,
            type: "green",
            typeAnimated: true,
            autoClose: "ok|3000",
            buttons: {
              ok: function() {
                location.href = "escalamiento/escalamiento";
              }
            }
        });
      } else {
        $.alert({
          icon: "fa fa-warning",
          title: "Error al intentar cerrar la actividad",
          content: json.message,
          type: "red",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {}
          }
      });
    }
    },
    error: function(xhr, status) {
      msg_box_alert(99, "title", xhr.responseText);
    }
  });
}

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
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad", "Acciones");
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
                     ], "aoColumnDefs": [
                      {
                           "aTargets": [8],
                      
                           "mRender": function (data, type, full) {
                            return '<input type="button" class="btn btn-success" onclick="visualizarActividad()" value="Estado"> <input type="button" class="btn btn-info" onclick="cambiarEstadoActividad()" value="Visualizar">';
                           }
                       }
                    ]

                  //   columnDefs: [
                  //     { targets: [0,1], visible: true},
                  //     { targets: '_all', visible: false }
                  // ]
            });
        break;

        case 'pendiente':
            $("#home").find("h3").text("Detalle Pendientes");
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad", "Acciones");
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
                    ], "aoColumnDefs": [
                      {
                           "aTargets": [8],
                      
                           "mRender": function (data, type, full) {
                            return '<input type="button" class="btn btn-success" onclick="visualizarActividad(  )" value="Estado"> <input type="button" class="btn btn-info" onclick="cambiarEstadoActividad()" value="Visualizar">';
                           }
                       }
                    ]
            });
        break;

        case 'seguimiento':

            $("#home").find("h3").text("Detalle Seguimiento");
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad", "Acciones");
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
                    ], "aoColumnDefs": [
                      {
                           "aTargets": [8],
                      
                           "mRender": function (data, type, full) {
                            return '<input type="button" class="btn btn-success" onclick="visualizarActividad()" value="Estado"> <input type="button" class="btn btn-info" onclick="cambiarEstadoActividad()" value="Visualizar">';
                           }
                       }
                    ]
            });
        break;

        case 'finalizadaHoy':
            $("#home").find("h3").text("Detalle Finalizadas Hoy");
            var cols = new Array("Fecha Ingreso", "Fecha Compromiso", "Rut", "Id Actividad", "Comuna", "Remitente", "Bloque","Tipo de Actividad", "Acciones");
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
                    ], "aoColumnDefs": [
                      {
                           "aTargets": [8],
                      
                           "mRender": function (data, type, full) {
                               return '<button>Visualizar</button>';
                           }
                       }
                    ]
            });
        break;

        default:
            break;
    }
}

function visualizarActividad(idActividad) {
  var formData = new FormData();
  formData.append("idActividad", idActividad);
  $.ajax({
    type: "POST",
    url: "api/visualizarActividad",
    contentType: false,
    processData: false,
    data: formData,
    success: function(data) {
      if (data.success == 1) {
        $.confirm({
          escapeKey: "formSubmit",
          icon: "glyphicon glyphicon-list-alt",
          title: "Detalle Actividad",
          columnClass: 'col-lg-12',
          content: data.html,
          type: "green",
          buttons: {
            formSubmit: {
              text: "Aceptar",
              btnClass: "btn-default",
              action: function() {}
            }
          }
        });
      } else {
        $.confirm({
          escapeKey: "formSubmit",
          icon: "glyphicon glyphicon-remove",
          title: "Detalle Actividad",
          content: "<h4>Error al visualizar Actividad</h4>",
          type: "red",
          buttons: {
            formSubmit: {
              text: "Aceptar",
              btnClass: "btn-green",
              action: function() {}
            }
          }
        });
      }
    },
    error: function(xhr, status) {
      msg_box_alert(99, "Filtrar Ordenes", xhr.responseText);
    }
  });
}

function cambiarEstadoActividad(){
  console.log("cambiarEstadoActividad");
}
 $(document).ready(function () {
      //si existe el elemento realizara esta gestion
      if ($("#tabla").length == 1) {
        cargarTabla("gestionada");        
      }
    });
