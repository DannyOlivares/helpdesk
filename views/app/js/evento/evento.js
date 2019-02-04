$(document).ready(function () {
    //console.log(document.getElementById("fechaMostrar").value);
    $(".pick-n").on("click", function () {
        console.log("pincho fecha");
    });
});

function obtenerEventosFecha(){

    var formData = new FormData();
    formData.append("fechaMostrar", document.getElementById("fechaMostrar").value);
    $.ajax({
      type: "POST",
      url: "api/obtenerEventosFecha",
      contentType: false,
      processData: false,
      data: formData,
      success: function(data) {
          $("ul.timeline").remove();
          $(".row > .col > .box").append("<ul class='timeline'><li class='time-label'><span class='bg-red'>"+document.getElementById("fechaMostrar").value+"</span></li></ul>");
          $.each(data, function(index, value) {
              $("ul.timeline").append("<li><i class='fa fa-user bg-blue'></i><div class='timeline-item'><span class='time'><i class='fa fa-clock-o'></i>"+value['fecha_ingreso']+"</span><h3 class='timeline-header'><a href='evento/listar_evento/"+value['id']+"'>"+value['descripcion_evento']+"</a></h3><div class='timeline-body'><table><thead><tr><td>Ingresado Por: </td><td><strong>"+value['name']+"</strong></td></tr><tr><td>Observación:</td><td>"+value['observacion_evento']+"</td></tr>");
              if (value['estado_evento'] == 1) {
                  $("div.timeline-body:last").find("table > thead").append("<tr><td>Estado:</td><td><strong>Finalizado</strong>(no es posible editar)</td></tr>");
              } else {
                  $("div.timeline-body:last").find("table > thead").append("<tr><td>Estado:</td><td><strong>Pendiente</strong></td></tr>");
              }
              $("ul.timeline").append("</thead></table></div></div></li>");
          });
        }
    });
}

function crearEvento(){
        $("#responsable_input").val(concatenar_selectmultiple('responsable_select',false))
        $("#areaContingencia_input").val(concatenar_selectmultiple('areaContingencia_select',false))
        $.ajax({
          type: "POST",
          url: "api/crearEvento",
          data: $("#form_evento").serialize(),
          success: function(json) {
            if (json.success == 1) {
              $.alert({
                icon: "fa fa-warning",
                title: "Evento Creado",
                content: json.message,
                type: "green",
                typeAnimated: true,
                autoClose: "ok|3000",
                buttons: {
                  ok: function() {
                    location.href = "evento/listar_evento";
                  }
                }
              });
            } else {
              $.alert({
                icon: "fa fa-warning",
                title: "Evento Rechazado",
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

    function visualizar(idEvento) {
      var formData = new FormData();
      formData.append("idEvento", idEvento);
      $.ajax({
        type: "POST",
        url: "api/visualizar_evento",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data) {
          if (data.success == 1) {
            $.confirm({
              escapeKey: "formSubmit",
              icon: "glyphicon glyphicon-list-alt",
              title: "Observacion Evento",
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
              title: "Observacion Evento",
              content: "<h4>No se pudo visualizar el evento</h4>",
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


function eliminar_evento(Nid) {
  var formData = new FormData();
  formData.append("valorX", Nid);
  $.ajax({
    type: "POST",//envio hacia el modelo
    url: "api/eliminar_evento",//ruta envio de datos(donde son enviados los datos)
    contentType: false,
    processData: false,
    data: formData,
    success: function(data) {
      if (data.success == 1) {
        $.confirm({
          escapeKey: "formSubmit",
          icon: "glyphicon glyphicon-list-alt",
          title: "Eliminar Evento",
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
          title: "Eliminar Evento",
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
      msg_box_alert(99, "Eliminar Evento", xhr.responseText);
    }
  });
}

function concatenar_selectmultiple(classname,sele = false){

    let select = document.getElementsByClassName(classname)[0],
        options = select.options,
        len = options.length,
        i=0;
    var data = "";
    if (sele == false){
        while (i<len){
            if (i == (len-1)) {
                data+= options[i].value;
                i++;
            }else{
                data+= options[i].value+"|";
                i++;
            }
        }
    }else{
        while (i<len){
          if (options[i].selected)
            if (i == (len-1)) {
                data+= options[i].value;
                i++;
            }else {
                data+= options[i].value+"|";
                i++;
            }
        }
    }
    return data;
}

$("#modificarEvento, #modificarEvento1").on("click", function() {
$("#areaModInput").val(concatenar_selectmultiple('areaModificada',false))
$("#areaResInput").val(concatenar_selectmultiple('responsableModificado',false))
  $.ajax({
    type: "POST",
    url: "api/editar_evento",
    data: $("#form_editar_evento").serialize(),
    success: function(json) {

      if (json.success == 1) {
        $.alert({
          icon: "fa fa-warning",
          title: "Evento modificado",
          content: json.message,
          type: "green",
          typeAnimated: true,
          autoClose: "ok|3000",
          buttons: {
            ok: function() {
              location.href = "evento/listar_evento";
            }
          }
        });
      } else {
        $.alert({
          icon: "fa fa-warning",
          title: "Error al Modificar",
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
