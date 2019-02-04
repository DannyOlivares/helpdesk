/**
 * Ajax msg_box_alert
 *@param opcion = resultado de la respuesta desde el Modelo (json.success)
 *@param titulo = titulo de mensaje
 *@param message = puede ser un mensaje personalizado o el que entrega el modelo (json.message)
 *@param accionsuccess = Accion a Ejecutar si json.success = 1   (reload|redirect) => opcional
 *@param accion_redirect = en caso de Ejecutar redirect (agregar controlador a redirigir) => opcional
 *@message
*/
function msg_box_alert(opcion,titulo,message,accionsuccess,accion_redirect){
  if (opcion == 0 ){ //alert
    $.dialog({
      title: titulo,
      type: 'orange',
      typeAnimated: true,
      content: message,
    });
  }else if (opcion == 1 ) { //sucess
    $.dialog({
      title: titulo,
      type: 'green',
      typeAnimated: true,
      content: message,
    });
    if (accionsuccess == 'reload'){
      setTimeout(function(){
          location.reload();
      },1000);
    }else if (accionsuccess == 'redirect'){
      setTimeout(function(){
          location.href = accion_redirect;
      },1000);
    }else if (accionsuccess == 'back'){
        setTimeout(function(){
                window.location.href = document.referrer;
        },1000);
    }
  }else if (opcion == 99 ) { //error
    $.dialog({
      title: titulo,
      type: 'red',
      typeAnimated: true,
      content: message,
    });
  }
}

/**
 * Ajax execute_accion
 * @param method = metodo de envio de datos
 * @param api_rest = corresponde a funcion agregada en api/http/method  (no se si realmente de se llama asi)
 * @param fomulario = formulario de donde se extrae la informacion a enviar
 * @param accionsuccess = Accion a Ejecutar si json.success = 1   (reload|redirect) => opcional
 * @param accion_redirect = en caso de Ejecutar redirect (agregar controlador a redirigir) => opcional
 * incluye funcion msg_box_alert
*/
function execute_accion_portal(method,api_rest,formulario,accion,accion_redirect){
  switch(api_rest) {
    case "resetpass":
      title='Modifica contraseña';
      break;
  }
  $.ajax({
    type : method,
    url : 'api/'+api_rest,
    data : $('#'+ formulario).serialize(),
    success : function(json) {
      msg_box_alert(json.success,title,json.message,accion,accion_redirect);
    },
    error : function(/*xhr, status*/) {
      msg_box_alert(99,title,'Ha ocurrido un problema.');
    }
  });
}
function AskForWebNotificationPermissions()
{
    if (Notification) {
        Notification.requestPermission();
    }
}
function notificacion_emergente(sistema_name,id_user){
    AskForWebNotificationPermissions();
    var formData = new FormData();
    formData.append('id_user',id_user);
    $.ajax({
        type : "POST",
        url : 'api/notificacion_emergente',
        contentType:false,
        processData:false,
        data : formData,
        success : function(json) {
            if (json.opcion == 1){

                for (var valor of json.result) {

                    var options = {
                        body: valor.mensaje,
                        icon: "views/app/images/favicon.ico"
                    };
                    titulo = valor.modulo + " - ";
                    if (valor.titulo == "sistema_name"){
                        titulo += "Sistema " + sistema_name;
                    }else{
                        titulo += valor.titulo;
                    }

                    var noti = new Notification(titulo, options);
                    setTimeout( function() { noti.close() }, 3000)
                }

            }
        },
        error : function(/*xhr, status*/) {
            msg_box_alert(99,"oops",'Ha ocurrido un problema.');
        }
    });
}
/**
 * Events
 */
$('#reset_pass').click(function(e) {
  e.defaultPrevented;
  execute_accion_portal("POST","resetpass","resetpass_form","reload");
});
$('#resetpass_form').keypress(function(e) {
    e.defaultPrevented;
    if(e.which == 13) {
        execute_accion_portal("POST","resetpass","resetpass_form","reload");
        return false;
    }
});
function mostrar_boton_guardar(rut_personal){
    $("#div_boton_guardar").html("<a data-toggle='tooltip' data-placement='top' title='Guardar Orden' class='btn btn-primary btn-md col-md-3' onclick='guardar_solicitud_anticipo_mensual("+rut_personal+")'><i class='glyphicon glyphicon-floppy-disk'></i></a>")
}
function guardar_solicitud_anticipo_mensual(rut_personal){
    var formData = new FormData();
    formData.append('rut_personal',rut_personal);
    formData.append('monto',document.getElementById("monto_anticipo").value);
    $.ajax({
        type : "POST",
        url : 'api/guardar_solicitud_anticipo_mensual',
        contentType:false,
        processData:false,
        data : formData,
        success : function(json) {
            msg_box_alert(json.opcion,"Anticipo",json.mensaje,'reload');
        },
        error : function(/*xhr, status*/) {
            msg_box_alert(99,"oops",'Ha ocurrido un problema.');
        }
    });
}
