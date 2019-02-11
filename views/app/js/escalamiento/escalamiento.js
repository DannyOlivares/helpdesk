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
                location.href = "escalamiento/agregarEncargadoFiltrar";
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
                location.href = "escalamiento/agregarEscalamientoNoCorresponde";
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
                  location.href = "escalamiento/agregarEscalamiento";
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
                location.href = "escalamiento/agregarEncargadoFiltrar";
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

function pintar($var){
    
}
