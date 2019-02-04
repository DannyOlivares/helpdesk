$("#agregarCasillero_abajo").on("click", function() {
  $.ajax({
    type: "POST",
    url: "api/agregar_casillero",
    data: $("#form_casillero").serialize(),
    success: function(json) {
      if (json.success == 1) {
        $.alert({
          icon: "fa fa-warning",
          title: "Casillero",
          content: json.message,
          type: "green",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {
              location.reload();
            }
          }
        });
      } else {
        $.alert({
          icon: "fa fa-warning",
          title: "Casillero",
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
});
$("#agregarCasillero").on("click", function() {
  $.ajax({
    type: "POST",
    url: "api/agregar_casillero",
    data: $("#form_casillero").serialize(),
    success: function(json) {
      if (json.success == 1) {
        $.alert({
          icon: "fa fa-warning",
          title: "Casillero",
          content: json.message,
          type: "green",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {
              location.reload();
            }
          }
        });
      } else {
        $.alert({
          icon: "fa fa-warning",
          title: "Casillero",
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
});
$("#modificarCasillero").on("click", function() {
  $.ajax({
    type: "POST",
    url: "api/editar_casillero",
    data: $("#form_editar_casillero").serialize(),
    success: function(json) {
      if (json.success == 1) {
        $.alert({
          icon: "fa fa-warning",
          title: "Casillero",
          content: json.message,
          type: "green",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {
              location.href = "casilleros/listar_casilleros";
            }
          }
        });
      } else {
        $.alert({
          icon: "fa fa-warning",
          title: "Casillero",
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
});
function visualizar(Norden) {
  var formData = new FormData();
  formData.append("Norden", Norden);
  $.ajax({
    type: "POST",
    url: "api/visualizar_casillero",
    contentType: false,
    processData: false,
    data: formData,
    success: function(data) {
      if (data.success == 1) {
        $.confirm({
          escapeKey: "formSubmit",
          icon: "glyphicon glyphicon-list-alt",
          title: "Observacion Casillero",
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
          title: "Observacion Casillero",
          content: "<h4>No se pudo visualizar el casillero</h4>",
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
function eliminar(Norden) {
  var formData = new FormData();
  formData.append("Norden", Norden);
  $.ajax({
    type: "POST",
    url: "api/eliminar_casillero",
    contentType: false,
    processData: false,
    data: formData,
    success: function(data) {
      if (data.success == 1) {
        $.confirm({
          escapeKey: "formSubmit",
          icon: "glyphicon glyphicon-list-alt",
          title: "Observacion Casillero",
          content: data.message,
          type: "green",
          autoClose: "formSubmit|3000",
          buttons: {
            formSubmit: {
              text: "Aceptar",
              btnClass: "btn-default",
              action: function() {
                location.reload();
              }
            }
          }
        });
      } else {
        $.confirm({
          escapeKey: "formSubmit",
          icon: "glyphicon glyphicon-remove",
          title: "Observacion Casillero",
          content: data.message,
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
function filtrar_todas_ordenes(){
    $.ajax({
        type : 'POST',
        url : 'api/casilleros_filtrar_todas_ordenes',
        data : $('#form_filtrar_todas_ordenes').serialize(),
        success : function(json) {
            var table= $('#dataordenes').DataTable();
            table.clear().draw();
            if(json.success==1){
                var ruta="views/app/temp/" + json.message;
                var request = $.ajax( ruta , {dataType:'json'} );
                request.done(function (resultado) {
                    table.rows.add(resultado.aaData).draw();
                });
            }
        },
        error : function(xhr, status) {
            msg_box_alert(99,'Filtrar Ordenes',xhr.responseText);
        }
    });
}
function exportarexcel() {

    var desde=document.getElementById('fechaI').value;
    var hasta=document.getElementById('fechaF').value;

    location.href = 'casilleros/exportar?desde='+desde+'&hasta='+hasta;

}

function revisar_por_fecha_reporte_produccion(){
    var desde=document.getElementById('textdesde').value;
    var hasta=document.getElementById('texthasta').value;

    if(desde>hasta){
        $.alert("Las fechas ingresadas son erroneas");
    }else{
        var formd = new FormData();
        formd.append('desde',desde);
        formd.append('hasta',hasta);
        $.ajax({
            type : 'POST',
            url : 'api/Casilleros_getGraficoProducciondia',
            contentType: false,
            processData: false,
            data: formd,
            success : function(data) {
                if(data.success==1){
                    $('#tblfiltro').html(data.html);
                    var serie= []; var valor= []; var accion=[];
                    $.each(data.json, function(i,o){
                        serie.push(String(o.x));
                        accion.push(String(o.z));
                        valor.push(parseFloat(o.y));

                    });

                }
            },
            error : function(xhr, status) {
                msg_box_alert(99,'title',xhr.responseText);
            }
        });
    }
}
function carga_motivo_casillero(){
    accion = document.getElementById('accion').value;
    var formd = new FormData();
    formd.append('accion',accion);
    $.ajax({
        type : 'POST',
        url : 'api/Casilleros_getMotivoAccionCasilleros',
        contentType: false,
        processData: false,
        data: formd,
        success : function(data) {
            if(data.success==1){
                $("#div_motivo").html(data.data);
            }else{
                $("#div_motivo").html("");
            }
        },
        error : function(xhr, status) {
            msg_box_alert(99,'title',xhr.responseText);
        }
    });

}
function cargardeeps(){
  comuna = document.getElementById('comuna').value;
  var formd = new FormData();
  formd.append('comuna',comuna);
  $.ajax({
      type : 'POST',
      url : 'api/Casilleros_cargareps',
      contentType: false,
      processData: false,
      data: formd,
      success : function(json) {
          $("#diveps").html("");
          $("#diveps").html(json.html);
      },
      error : function(xhr, status) {
          msg_box_alert(99,'title',xhr.responseText);
      }
  });

}
