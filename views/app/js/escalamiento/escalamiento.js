function agregarEscalamiento() {
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

function crearEncargadoFiltrar() {
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
      } else if (json.success == 0) {
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
      } else if (json.success == 2) {
        $.alert({
          icon: "fa fa-warning",
          title: "finalizar actividad",
          content: json.message,
          type: "red",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {
              location.href =
                "escalamiento/agregarEscalamientoNoCorresponde/" + json.idActv+"/"+json.nombreRemitente;
            }
          }
        });
      } else if (json.success == 3) {
        $.alert({
          icon: "fa fa-warning",
          title: "agregar Actividad",
          content: json.message,
          type: "red",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {
              location.href = "escalamiento/agregarEscalamiento/" + json.idActv;
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

function agregarEscalamientoNoCorresponde() {
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

function cargarTabla(tipo) {
  //busca el elemento h3 y lo vacia
  $("#home")
    .find("h3")
    .text("");
  if ($("#t1").hasClass("dataTable")) {
    //nombre de la clase a buscar
    $("#t1")
      .dataTable()
      .fnDestroy();
  }
  $("#t1 tbody").remove();
  $("#t1 thead th").remove();

  switch (tipo) {
    case "gestionada":
      $("#home")
        .find("h3")
        .text("Detalle Gestionadas");
      var cols = new Array(
        "Fecha Ingreso",
        "Fecha Compromiso",
        "Rut",
        "Id Actividad",
        "Comuna",
        "Remitente",
        "Bloque",
        "Tipo de Actividad",
        "Acciones"
      );
      $.each(cols, function(index, value) {
        $("#t1")
          .find("thead > tr")
          .append("<th>" + value + "</th>");
      });

      $("#t1").dataTable({
        ajax: {
          url: "api/tablaGestionada",
          type: "POST"
        },
        language: {
          search: "Buscar:",
          zeroRecords: "No hay datos para mostrar",
          info: "Mostrando _END_ Registros, de un total de _TOTAL_ ",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          infoEmpty: "No hay entradas para mostrar",
          lengthMenu: "Mostrar _MENU_ Filas",

          paginate: {
            first: "Primera",
            last: "Ultima",
            next: "Siguiente",
            previous: "Anterior"
          }
        },
        autoWidth: true,
        scrollX: true,
        bSort: false,
        bInfo: false,
        iDisplayLength: 8,
        pagingType: "full_numbers",
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excel",
            text: ""
          }
        ],
        aoColumnDefs: [
          {
            aTargets: [8],
            mRender: function(data, type, full) {
              return (
                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(' +
                full[3] +
                ')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(' +
                full[3] +
                ')" value="Visualizar">'
              );
            }
          }
        ]
      });
      break;

    case "pendiente":
      $("#home")
        .find("h3")
        .text("Detalle Pendientes");
      var cols = new Array(
        "Fecha Ingreso",
        "Fecha Compromiso",
        "Rut",
        "Id Actividad",
        "Comuna",
        "Remitente",
        "Bloque",
        "Tipo de Actividad",
        "Acciones"
      );
      $.each(cols, function(index, value) {
        $("#t1")
          .find("thead > tr")
          .append("<th>" + value + "</th>");
      });
      $("#t1").dataTable({
        ajax: {
          url: "api/tablaPendientes",
          type: "POST"
        },
        language: {
          search: "Buscar:",
          zeroRecords: "No hay datos para mostrar",
          info: "Mostrando _END_ Registros, de un total de _TOTAL_ ",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          infoEmpty: "No hay entradas para mostrar",
          lengthMenu: "Mostrar _MENU_ Filas",

          paginate: {
            first: "Primera",
            last: "Ultima",
            next: "Siguiente",
            previous: "Anterior"
          }
        },
        autoWidth: true,
        scrollX: true,
        bSort: false,
        bInfo: false,
        iDisplayLength: 8,
        pagingType: "full_numbers",
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excel",
            text: ""
          }
        ],
        aoColumnDefs: [
          {
            aTargets: [8],

            mRender: function(data, type, full) {
              return (
                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(' +
                full[3] +
                ')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(' +
                full[3] +
                ')" value="Visualizar">'
              );
            }
          }
        ]
      });
      break;

    case "seguimiento":
      $("#home")
        .find("h3")
        .text("Detalle Seguimiento");
      var cols = new Array(
        "Fecha Ingreso",
        "Fecha Compromiso",
        "Rut",
        "Id Actividad",
        "Comuna",
        "Remitente",
        "Bloque",
        "Tipo de Actividad",
        "Acciones"
      );
      $.each(cols, function(index, value) {
        $("#t1")
          .find("thead > tr")
          .append("<th>" + value + "</th>");
      });
      $("#t1").dataTable({
        ajax: {
          url: "api/tablaAsignadas",
          type: "POST"
        },
        language: {
          search: "Buscar:",
          zeroRecords: "No hay datos para mostrar",
          info: "Mostrando _END_ Registros, de un total de _TOTAL_ ",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          infoEmpty: "No hay entradas para mostrar",
          lengthMenu: "Mostrar _MENU_ Filas",

          paginate: {
            first: "Primera",
            last: "Ultima",
            next: "Siguiente",
            previous: "Anterior"
          }
        },
        autoWidth: true,
        scrollX: true,
        bSort: false,
        bInfo: false,
        iDisplayLength: 8,
        pagingType: "full_numbers",
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excel",
            text: ""
          }
        ],
        aoColumnDefs: [
          {
            aTargets: [8],
            mRender: function(data, type, full) {
              return (
                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(' +
                full[3] +
                ')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(' +
                full[3] +
                ')" value="Visualizar">'
              );
            }
          }
        ]
      });
      break;

    case "finalizadaHoy":
      $("#home")
        .find("h3")
        .text("Detalle Finalizadas Hoy");
      var cols = new Array(
        "Fecha Ingreso",
        "Fecha Compromiso",
        "Rut",
        "Id Actividad",
        "Comuna",
        "Remitente",
        "Bloque",
        "Tipo de Actividad",
        "Acciones"
      );
      $.each(cols, function(index, value) {
        $("#t1")
          .find("thead > tr")
          .append("<th>" + value + "</th>");
      });
      $("#t1").dataTable({
        ajax: {
          url: "api/actividadesFinalizadasHoy",
          type: "POST"
        },
        language: {
          search: "Buscar:",
          zeroRecords: "No hay datos para mostrar",
          info: "Mostrando _END_ Registros, de un total de _TOTAL_ ",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          infoEmpty: "No hay entradas para mostrar",
          lengthMenu: "Mostrar _MENU_ Filas",

          columns: [
            { data: "nombre" },
            { defaultContent: "<button>Editar</button>" }
          ],

          paginate: {
            first: "Primera",
            last: "Ultima",
            next: "Siguiente",
            previous: "Anterior"
          }
        },
        autoWidth: true,
        scrollX: true,
        bSort: false,
        bInfo: false,
        iDisplayLength: 8,
        pagingType: "full_numbers",
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excel",
            text: ""
          }
        ],
        aoColumnDefs: [
            {
              aTargets: [8],
              mRender: function(data, type, full) {
                return (
                  '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(' +
                  full[3] +
                  ')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(' +
                  full[3] +
                  ')" value="Visualizar">'
                );
              }
            }
          ]
      });
      break;

      case "noCorresponde":
      $("#home")
        .find("h3")
        .text(" Detalle Actividades no corresponden");
      var cols = new Array(
        "Id Actividad",
        "Fecha Ingreso",
        "Fecha Compromiso",
        "Rut Cliente",
        "Descripción",
        "Remitente",
        "canal",
        "Creador",
        "tipoActividad",
        "Acciones"
      );
      $.each(cols, function(index, value) {
        $("#t1")
          .find("thead > tr")
          .append("<th>" + value + "</th>");
      });
      $("#t1").dataTable({
        ajax: {
          url: "api/actividadesNoCorresponden",
          type: "POST"
        },
        language: {
          search: "Buscar:",
          zeroRecords: "No hay datos para mostrar",
          info: "Mostrando _END_ Registros, de un total de _TOTAL_ ",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          infoEmpty: "No hay entradas para mostrar",
          lengthMenu: "Mostrar _MENU_ Filas",

          columns: [
            { data: "nombre" },
            { defaultContent: "<button>Editar</button>" }
          ],

          paginate: {
            first: "Primera",
            last: "Ultima",
            next: "Siguiente",
            previous: "Anterior"
          }
        },
        autoWidth: true,
        scrollX: true,
        bSort: false,
        bInfo: false,
        iDisplayLength: 8,
        pagingType: "full_numbers",
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excel",
            text: ""
          }
        ],
        aoColumnDefs: [
            {
              aTargets: [9],
              mRender: function(data, type, full) {
                
                return (
                  
                  '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(' +
                  full[0] +
                  ')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividadNoCorresponde(' +
                  full[0] +
                  ')" value="Visualizar">'
                );
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
          columnClass: "col-lg-12",
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

function visualizarActividadNoCorresponde(idActividad) {
  var formData = new FormData();
  formData.append("idActividad", idActividad);
  $.ajax({
    type: "POST",
    url: "api/visualizarActividadNoCorresponde",
    contentType: false,
    processData: false,
    data: formData,
    success: function(data) {
      if (data.success == 1) {
        $.confirm({
          escapeKey: "formSubmit",
          icon: "glyphicon glyphicon-list-alt",
          title: "Detalle Actividad",
          columnClass: "col-lg-12",
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

/*
FIXME:
Funcion encargada de modificar estado actividad
*/

function cambiarEstadoActividad(idActividad) {
  var formData = new FormData();
  formData.append("idActividad", idActividad);
  $.ajax({
    type: "POST",
    url: "api/cambiarEstadoActividad",
    contentType: false,
    processData: false,
    data: formData,
    // success: function(data) {
    //     if (data.success == 1) {
    //       $.confirm({
    //         escapeKey: "formSubmit",
    //         icon: "glyphicon glyphicon-list-alt",
    //         title: "Cambiar Estado",
    //         columnClass: "col-lg-12",
    //         content: data.html,
    //         type: "green",
    //         buttons: {
    //           formSubmit: {
    //             text: "Aceptar",
    //             btnClass: "btn-default",
    //             action: function() {}
    //           }
    //         }
    //       });
    //     }


    success: function(data) {
      if (data.success == 1) {
        $.confirm({
          title: "Mi Estado",
          content:
            "" +
            '<form class="formName">' +
            '<div class="form-group">' +
            "<label>Ingrese Cambio de estado</label>" +
            '<table style="table"><thead><th>hola</th><th>chao</th><th>hola</th><th>chao</th><th></th></thead><tbody><tr><td><input></input></td></tr><tr><td><input></input></td></tr><tr><td><input></input></td></tr><tr><td><input></input></td></t></tbody></table>' +
            '<button onclick=cargarActividades()>Enviar</button>'+
            "</div>" +
            "</form>"
          // buttons: {
          //   Confirmar: function() {
          //     $.alert("Confirmado!");
          //   },
          //   Cancelar: function() {
          //     $.alert("Cancelado!");
          //   },
          //   brake: function() {
          //     $.alert("brake!");
          //   },
          //   somethingElse: {
          //     text: "Something else",
          //     btnClass: "btn-blue",
          //     keys: ["enter", "shift"],
          //     action: function() {
          //       $.alert("Something else?");
          //     }
          //   }
          // }
        });
      } 
    
        else {
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
    }
  });
}



function cargarActividades() {
  console.log("hola");
}

$(document).ready(function() {
  //si existe el elemento realizara esta gestion
  if ($("#tabla").length == 1) {
    cargarTabla("gestionada");
  }
});
