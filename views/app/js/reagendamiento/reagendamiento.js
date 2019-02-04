    function subirarchivoexcel(){
        $("#div_cargando").html($("#cargador").html());
        var formper = new FormData();
        formper.append('excel',document.getElementById('blindfile').files[0]);
        $.ajax({
          type : 'POST',
          url : 'api/Mdlreagendamiento_cargarorden',
          contentType:false,
          processData:false,
          data : formper,
          success : function(json) {
              if ( json.success == 1 ){
                  msg_box_alert(json.success,"Datos Cargados",json.message,'reload');

              }else{
                  msg_box_alert(json.success,"Error",json.message);
              }
              $("#div_cargando").html('<a class="btn btn-success btn-social" title="Exportar a Excel" data-toggle="tooltip" onclick="subirarchivoexcel()"><i class="fa fa-arrow-up"></i> Cargar Ordenes</a>');
          },
          error : function(xhr, status) {
              $("#div_cargando").html('<a class="btn btn-success btn-social" title="Exportar a Excel" data-toggle="tooltip" onclick="subirarchivoexcel()"><i class="fa fa-arrow-up"></i> Cargar Ordenes</a>');
            msg_box_alert(99,"Error",xhr.responseText);
          }
        });
    }
    function cruzarbases(){
        location.href = 'reagendamiento/cruzarbases';
    }
    function cargarinconcistencia(){
        location.href = 'reagendamiento/cargarinconcistencia';
    }
    function activar(modulo){
        var id=document.getElementById('txtnumorden').value;
        var formpes = new FormData();
        formpes.append('modulo',modulo);
        formpes.append('id',id);
        $.ajax({
            type : 'POST',
            url : 'api/Mdlreagendamiento_activar',
            contentType:false,
            processData:false,
            data : formpes,
            success : function(json) {
                if ( json.success == 1 ){
                    location.reload();
                }else if (json.success == 2) {
                    location.reload();
                }else{
                    $.confirm({
                        icon: 'glyphicon glyphicon-danger',
                        title: 'Devolver Orden',
                        content: '<h4>¿La orden no ha sido gestionada, desea devolverla?</h4>',
                        type: 'red',
                        buttons: {
                            confirmar:{
                                text: '<h5>Aceptar</h5>',
                                btnClass: 'btn-default',
                                action: function () {
                                    var formde = new FormData();
                                    formde.append('id', id);
                                    $.ajax({
                                        type: "POST",
                                        url: "api/Mdlreagendamiento_devolver",
                                        contentType: false,
                                        processData: false,
                                        data: formde,
                                        success: function (data) {
                                            if (data.success == 1) {
                                                msg_box_alert(data.success,"Control",data.message,"reload")
                                            }
                                        },
                                        error: function (xhr, status) {
                                            msg_box_alert(99, 'Filtrar Ordenes', xhr.responseText);
                                        }
                                    });
                                }
                            },
                            cancel: {
                                text: '<h5>CANCELAR</h5>',
                                btnClass: 'btn-default',
                                action: function () {
                                }
                            }
                        }
                    })
                }
            },
            error : function(xhr, status) {
                msg_box_alert(99,'Error',xhr.responseText);
            }
        });
    }
    function agregar_observacion(){
        $('#modal_observacion').modal('show');
        var rut_cliente=document.getElementById('txtrutcliente').value;
        var formobs=new FormData();
        formobs.append('rut_cliente',rut_cliente);
        $.ajax({
            type : 'POST',
            url : 'api/Mdlreagendamiento_agregarobservacion',
            contentType: false,
            processData: false,
            data: formobs,
            success : function(json) {
                if(json.success==1){
                    $('#modal_cargarobservacion').html(" ");
                    $('#modal_cargarobservacion').html(json.html);
                }
            },
            error : function(xhr, status) {
                msg_box_alert(99,'Error',xhr.responseText);
            }
        });
    }
    function guardar_observacion(){
        $.ajax({
            type : "POST",
            url : 'api/Mdlregendamiento_guardarobservacion',
            data : $('#formobs').serialize(),
            success : function(json) {
                msg_box_alert(json.success,'Agregar observación',json.message,'reload');
            },error : function(xhr, status) {
                msg_box_alert(99,'error',xhr.responseText);
            }
        });
    }






    function volverallamar(){
        var numorden=document.getElementById('txtnumorden').value;
        $.confirm({
            icon: 'glyphicon glyphicon-success',
            title: 'Observacion',
            columnClass: 'col-lg-8 col-sm-offset-2',
            content:"<form id='formdatos' name='formdatos'><input type='hidden' id='txtorden' name='txtorden' value="+numorden+"><div id='divprincipal' name='divprincipal' class='col-md-12'><div id='divopciones' name='divopciones' class='col-md-6'><h5>Seleccionar Opcion</h5><select class='form-control' id='cmbcontacto' name='cmbcontacto' onchange='selecestado()'><option value='0'>--</option>"+
            "<option value='1'>Sin Contacto</option><option value='2'>Con Contacto</option></select></div><div id='divmotivo' name='divmotivo' class='col-md-6'><h5>Seleccionar Opcion</h5><select class='form-control' id='cmbmotivo' name='cmbmotivo' onchange='selecmotivo()'><option value='0'>--</option></select><br></div></div><div id='divsegundario' name='divsegundario' class='col-md-12'><div id='divizquierdo' name='divizquierdo' class='col-md-6'></div><div id='divderecho' name='divderecho' class='col-md-6'></div></div><div id='divtercero' name='divtercero' class='col-md-12'><div id='divtblobservacion' name='divtblobservacion' class='col-md-12'></div></div></form>",
            type: 'green',
            buttons: {
                confirmar:{
                    text: '<h6>Aceptar</h6>',
                    btnClass: 'btn-default',
                    action: function () {
                        $.ajax({
                            type : "POST",
                            url : 'api/Mdlreagendamiento_volverallamar',
                            data : $('#formdatos').serialize(),
                            success : function(json) {
                                if(json.success==1){
                                    msg_box_alert(json.success,"ORDEN",json.message,"reload");
                                }else if(json.success==0){
                                    cancelarorden();
                                }else if(json.success==99){
                                    msg_box_alert(json.success,"ORDEN",json.message);
                                }else{
                                    $.confirm({
                                        icon: 'glyphicon glyphicon-danger',
                                        title: 'Cancelar Orden',
                                        content: "<form id='formcancelar2' name='formcancelar2'><input type='hidden' id='txtcancelarorden' name='txtcancelarorden' value="+numorden+"></form><h5>Ya se ha alcanzado el maximo de llamados, desea cancelar la orden?</h5>",
                                        type: 'red',
                                        buttons: {
                                            confirmar:{
                                                text: '<h5>Cancelar Orden</h5>',
                                                btnClass: 'btn-default',
                                                action: function () {
                                                    $.confirm({
                                                        icon: 'glyphicon glyphicon-danger',
                                                        title: 'Cancelar Orden',
                                                        columnClass: 'col-lg-8 col-sm-offset-2',
                                                        content: "<form id='formcancelar' name='formcancelar'><input type='hidden' id='txtorden2' name='txtorden2' value="+numorden+"><h5>Ingrese Observacion</h5><br><input type='text' id='observacion' name='observacion' class='form-control'></form>",
                                                        type: 'red',
                                                        buttons: {
                                                            confirmar:{
                                                                text: '<h5>Aceptar</h5>',
                                                                btnClass: 'btn-default',
                                                                action: function () {
                                                                    $.ajax({
                                                                        type : "POST",
                                                                        url : 'api/Mdlreagendamiento_cancelarorden',
                                                                        data : $('#formcancelar').serialize(),
                                                                        success : function(json) {
                                                                            if(json.success==1){
                                                                                msg_box_alert(json.success,"ORDEN",json.message,"reload");
                                                                            }
                                                                        },error : function(xhr, status) {
                                                                            msg_box_alert(99,'error',xhr.responseText);
                                                                        }
                                                                    });
                                                                }
                                                            },
                                                            cancel: {
                                                                text: '<h5>CANCELAR</h5>',
                                                                btnClass: 'btn-default',
                                                                action: function () {
                                                                }
                                                            }
                                                        }
                                                    })
                                                }
                                            },
                                            cancel: {
                                                text: '<h5>Volver a llamar</h5>',
                                                btnClass: 'btn-default',
                                                action: function () {
                                                    $.ajax({
                                                        type : "POST",
                                                        url : 'api/Mdlreagendamiento_guardarcancelado',
                                                        data : $('#formcancelar2').serialize(),
                                                        success : function(json) {
                                                            if(json.success==1){
                                                                msg_box_alert(json.success,"ORDEN",json.message,"reload");
                                                            }
                                                        },error : function(xhr, status) {
                                                            msg_box_alert(99,'error',xhr.responseText);
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    })
                                }
                            },
                            error : function(xhr, status) {
                                msg_box_alert(99,'error',xhr.responseText);
                            }
                        });
                    }
                },
                cancel: {
                    text: '<h6>CANCELAR</h6>',
                    btnClass: 'btn-default',
                    action: function () {
                    }
                }
            }
        })
    }
    function selecestado(){
        var opcion=document.getElementById('cmbcontacto').value;
        var formop=new FormData();
        formop.append('opcion',opcion);
        $.ajax({
            type : "POST",
            url : 'api/Mdlreagendamiento_cargar_motivo',
            contentType:false,
            processData:false,
            data : formop,
            success : function(json) {
                if(json.success == 1 ){
                    $('#divmotivo').html(" ");
                    $('#divmotivo').html(json.html);
                    $('#divderecho').html(" ");
                    $('#divizquierdo').html(" ");
                    $('#divtblobservacion').html(" ");
                }
            },error : function(xhr, status) {
                msg_box_alert(99,'error',xhr.responseText);
            }
        });
    }
    function selecmotivo(){
        var opcion=document.getElementById('cmbcontacto').value;
        var motivo=document.getElementById('cmbmotivo').value;
        var formmo=new FormData();
        formmo.append('motivo',motivo);
        formmo.append('opcion',opcion);
        $.ajax({
            type : "POST",
            url : 'api/Mdlreagendamiento_cargar_opcionmotivo',
            contentType:false,
            processData:false,
            data : formmo,
            success : function(json) {
                if(json.success == 1 ){
                    $('#divtblobservacion').empty();
                    $('#divizquierdo').empty();
                    $('#divizquierdo').html(json.html2);
                    $('#divderecho').empty();
                    $('#divderecho').html(json.html1);
                }else if(json.success == 3){
                    $('#divizquierdo').empty();
                    $('#divderecho').empty();
                    $('#divtblobservacion').empty();
                    $('#divtblobservacion').html(json.html);
                }
            },error : function(xhr, status) {
                msg_box_alert(99,'error',xhr.responseText);
            }
        });
    }



function guardarordenes(){
  var numorden=document.getElementById('txtnumorden').value;
  if (numorden==false){
    alert("Debe ingresar numero de orden")
  }else{
      $.ajax({
        type : "POST",
        url : 'api/Mdlregendamiento_consultarorden',
        data : $('#formordenes').serialize(),
        success : function(json) {
          if(json.success==1){
            $.confirm({
              icon: 'glyphicon glyphicon-danger',
              title: 'Orden ',
              content: '<h4>La orden ya existe en el sistema</h4>',
              type: 'red',
              buttons: {
                  confirmar:{
                      text: '<h5>Aceptar</h5>',
                      btnClass: 'btn-default',
                      action: function () {

                      }
                  },
              }
             })
          }else{
              $.confirm({
                icon: 'glyphicon glyphicon-danger',
                title: 'Orden no existe',
                content: '<h4>Orden no registrada, ¿desea agregar?</h4>',
                type: 'red',
                buttons: {
                    confirmar:{
                        text: '<h5>Aceptar</h5>',
                        btnClass: 'btn-default',
                        action: function () {
                          $.ajax({
                            type : "POST",
                            url : 'api/Mdlregendamiento_guardarorden',
                            data : $('#formordenes').serialize(),
                            success : function(json) {
                              if(json.success==1){
                                 volverallamar();
                              }
                            },error : function(xhr, status) {
                              msg_box_alert(99,'error',xhr.responseText);
                              }
                            });
                        }
                    },
                  cancel: {
                      text: '<h5>CANCELAR</h5>',
                      btnClass: 'btn-default',
                      action: function () {
                      }
                  }
                }
               })
          }
      },error : function(xhr, status) {
        msg_box_alert(99,'error',xhr.responseText);
        }

    });
  }
}

function reagendarordenes(){
  var numorden=document.getElementById('txtnumorden').value;
  if (numorden==false){
    alert("Debe ingresar numero de orden")
  }else{
      $.ajax({
        type : "POST",
        url : 'api/Mdlregendamiento_consultarorden',
        data : $('#formordenes').serialize(),
        success : function(json) {
          if(json.success==1){
            $.confirm({
              icon: 'glyphicon glyphicon-danger',
              title: 'Orden ',
              content: '<h4>La orden ya existe en el sistema</h4>',
              type: 'red',
              buttons: {
                  confirmar:{
                      text: '<h5>Aceptar</h5>',
                      btnClass: 'btn-default',
                      action: function () {

                      }
                  },
              }
             })
          }else{
              $.confirm({
                icon: 'glyphicon glyphicon-danger',
                title: 'Orden no existe',
                content: '<h4>Orden no registrada, ¿desea agregar?</h4>',
                type: 'red',
                buttons: {
                    confirmar:{
                        text: '<h5>Aceptar</h5>',
                        btnClass: 'btn-default',
                        action: function () {
                          $.ajax({
                            type : "POST",
                            url : 'api/Mdlregendamiento_guardarorden',
                            data : $('#formordenes').serialize(),
                            success : function(json) {
                              if(json.success==1){
                                 reagendarorden();
                              }
                            },error : function(xhr, status) {
                              msg_box_alert(99,'error',xhr.responseText);
                              }
                            });
                        }
                    },
                  cancel: {
                      text: '<h5>CANCELAR</h5>',
                      btnClass: 'btn-default',
                      action: function () {
                      }
                  }
                }
               })
          }
      },error : function(xhr, status) {
        msg_box_alert(99,'error',xhr.responseText);
        }

    });
  }

}







function cargarnuevaorden(){
  var formnuv=new FormData();
  $.ajax({
      type : "POST",
      url : 'api/Mdlreagendamiento_cargar_nueva',
      contentType:false,
      processData:false,
      data : formnuv,
      success : function(json) {
          if(json.success == 1 ){
            $('#divordenes').html(" ");
            $('#divordenes').html(json.html2);
            $('#divtabla').html(" ");
            $('#divtabla').html(json.html3);
            $('#divobservacion').html(" ");
            $('#divobservacion').html(json.html4);
            $('#divbotones').empty();
            $('#divbotones').html(json.html5);
            $('#divbtnagregar').empty();
            $('#divbtnagregar').html(json.html6);
          }else{

          }
      },error : function(xhr, status) {
          msg_box_alert(99,'error',xhr.responseText);
      }
  });
}





function cambiarestado(){
  document.getElementById('textobservacion').value="";
}

function reagendarorden(){
  var numorden=document.getElementById('txtnumorden').value;

  $.confirm({
    icon: 'glyphicon glyphicon-success',
    title: 'Reagendar Orden',
    content: "<form id='formreagendar' name='formreagendar'><input type='hidden' id='txtordenreag' name='txtordenreag' value="+numorden+"><h4>Agregue una observacion</h4><br><input type='text' id='txtreagendar' name='txtreagendar' class='form-control'></form>",
    type: 'green',
    buttons: {
        confirmar:{
            text: '<h5>Aceptar</h5>',
            btnClass: 'btn-default',
            action: function () {
              $.ajax({
                type : "POST",
                url : 'api/Mdlregendamiento_reagendarorden',
                data : $('#formreagendar').serialize(),
                success : function(json) {
                  if(json.success==1){
                    msg_box_alert(json.success,"ORDEN",json.message,"reload");
                  }

                  },error : function(xhr, status) {
                      msg_box_alert(99,'error',xhr.responseText);
                    }

                });
            }
        },
        cancel: {
            text: '<h5>CANCELAR</h5>',
            btnClass: 'btn-default',
            action: function () {
            }
        }
    }
})
}

function cancelarorden(){
var numorden=document.getElementById('txtnumorden').value;

$.confirm({
  icon: 'glyphicon glyphicon-danger',
  title: 'Cancelar Orden',
  content: "<form id='formcancelorden' name='formcancelorden'><input type='hidden' id='txtcancelar' name='txtcancelar' value="+numorden+"><h4>Agregue una observacion</h4><br><input type='text' id='txtcancelorden' name='txtcancelorden' class='form-control'></form>",
  type: 'red',
  buttons: {
      confirmar:{
          text: '<h5>Aceptar</h5>',
          btnClass: 'btn-default',
          action: function () {
            $.ajax({
              type : "POST",
              url : 'api/Mdlregendamiento_cancelaorden',
              data : $('#formcancelorden').serialize(),
              success : function(json) {
                if(json.success==1){
                  msg_box_alert(json.success,"ORDEN",json.message,"reload");
                }

                },error : function(xhr, status) {
                    msg_box_alert(99,'error',xhr.responseText);
                  }

              });
          }
      },
      cancel: {
          text: '<h5>CANCELAR</h5>',
          btnClass: 'btn-default',
          action: function () {
          }
      }
  }
})
}

function visualizar_ordenes(){
  $('#modal_visualizar').modal('show');
  $.ajax({
    type : "POST",
    url : 'api/Mdlregendamiento_visualizarorden',
    data : $('#formordenes').serialize(),
    success : function(json) {
      var table= $('#tblordenes').DataTable();
        table.clear().draw();
          if(json.success == 1 ){
            var ruta="views/app/temp/" + json.message;
            var request = $.ajax( ruta , {dataType:'json'} );
            request.done(function (resultado) {
                table.rows.add(resultado.aaData).draw();
              });
        }else{
            $.alert(json.message);
        }

      },error : function(xhr, status) {
          msg_box_alert(99,'error',xhr.responseText);
        }

    });
}
function distribuirordenes(){
  $.ajax({
    type : "POST",
    url : 'api/Mdlregendamiento_distribuirordenes',
    data : $('#formordenes').serialize(),
    success : function(json) {
      if(json.success==1){
        msg_box_alert(json.success,"ORDEN",json.message,"reload");

      }

      },error : function(xhr, status) {
          msg_box_alert(99,'error',xhr.responseText);
        }

    });
}

function cargarjavascript(){
  $.getScript('views/app/js/reagendamiento/reagendamiento.js');
}

$('#txtnumorden').keypress(function(e) {
    e.defaultPrevented;
    if(e.which == 13) {
        var estado=document.getElementById('idestado').value;
        if(estado==0){
            var orden=document.getElementById('txtnumorden').value;
            var formobs=new FormData();
            formobs.append('orden',orden);
            $.ajax({
                type : 'POST',
                url : 'api/Mdlreagendamiento_buscarorden',
                contentType: false,
                processData: false,
                data: formobs,
                success : function(json) {
                    if(json.success==1){
                        $('#divordenes').html(" ");
                        $('#divordenes').html(json.html);
                        $('#divbotones').html(" ");
                        $('#divbotones').html(json.html2);
                        cargarjavascript();
                    }else{
                        $.confirm({
                            icon: 'glyphicon glyphicon-danger',
                            title: 'Orden no asociada',
                            content: "<h4>No existe orden asociada</h4>",
                            type: 'red',
                            buttons: {
                                confirmar:{
                                    text: '<h5>Aceptar</h5>',
                                    btnClass: 'btn-default',
                                    action: function () {
                                        location.href="reagendamiento/usuarios";
                                    }
                                }
                            }
                        })
                    }
                },
                error : function(xhr, status) {
                    msg_box_alert(99,'Error',xhr.responseText);
                }
            });
        }
    }
});

$('#txtordenalta').keypress(function(e) {
    e.defaultPrevented;
    if(e.which == 13) {
        var ordenalta=document.getElementById('txtordenalta').value;
        var formobs=new FormData();
        formobs.append('ordenalta',ordenalta);
        $.ajax({
            type : 'POST',
            url : 'api/Mdlreagendamiento_buscarordenalta',
            contentType: false,
            processData: false,
            data: formobs,
            success : function(json) {
                if(json.success==1){
                    $('#divordenesalta').html(" ");
                    $('#divordenesalta').html(json.html);
                    $('#divbotonesalta').html(" ");
                    $('#divbotonesalta').html(json.html2);
                    cargarjavascript();
                }else{
                    msg_box_alert(json.success,"ORDEN",json.message)
                }
            },
                error : function(xhr, status) {
                msg_box_alert(99,'Error',xhr.responseText);
            }
        });
    }
});

function nuevaordenalta(){
    location.href="reagendamiento/altautilizacion";
}

function guardar_orden_altautilizacion(){
    $.ajax({
        type : "POST",
        url : 'api/Mdlregendamiento_guardaraltautilizacion',
        data : $('#formalta').serialize(),
        success : function(json) {
            if(json.success==1){
              msg_box_alert(json.success,"ORDEN",json.message,"reload")
            }else{
              msg_box_alert(json.success,"ORDEN",json.message)
            }
        },error : function(xhr, status) {
            msg_box_alert(99,'error',xhr.responseText);
        }
    });
}

function modificar_orden_altautilizacion(){
  $.ajax({
    type : "POST",
    url : 'api/Mdlregendamiento_modificaraltautilizacion',
    data : $('#formalta').serialize(),
    success : function(json) {
        if(json.success==1){
          msg_box_alert(json.success,"ORDEN",json.message,"reload")
        }

      },error : function(xhr, status) {
          msg_box_alert(99,'error',xhr.responseText);
        }
    });
}

function eliminar_orden_altautilizacion(){
  $.confirm({
    icon: 'glyphicon glyphicon-danger',
    title: 'Eliminar Orden',
    content: "<h4>¿Desea eliminar la orden?</h4>",
    type: 'red',
    buttons: {
        confirmar:{
            text: '<h5>Aceptar</h5>',
            btnClass: 'btn-default',
            action: function () {
              $.ajax({
                type : "POST",
                url : 'api/Mdlregendamiento_eliminarraltautilizacion',
                data : $('#formalta').serialize(),
                success : function(json) {
                    if(json.success==1){
                      msg_box_alert(json.success,"ORDEN",json.message,"reload");
                    }else{
                      msg_box_alert(json.success,"ORDEN",json.message);
                    }

                  },error : function(xhr, status) {
                      msg_box_alert(99,'error',xhr.responseText);
                    }
                });
            }
        },
        cancel: {
            text: '<h5>CANCELAR</h5>',
            btnClass: 'btn-default',
            action: function () {
            }
        }
    }
  })

}

function revisar_por_fecha_reporte_produccion(){
var fechadesde=document.getElementById("textdesde").value;
var fechahasta=document.getElementById("texthasta").value;

if (fechadesde>fechahasta){
  alert("Ingrese fechas validas");
}else{
  var formd = new FormData();
  formd.append('fechadesde',fechadesde);
  formd.append('fechahasta',fechahasta);
            $.ajax({
                  type : 'POST',
                  url : 'api/Mdlreagendamiento_mostrardatostabla',
                  contentType: false,
                  processData: false,
                  data: formd,
                  success : function(data) {
                      if(data.success==1){
                          $('#tblfiltro').html(data.html);
                          var serie= []; var valor= []; var total=[]; var llamar=[];
                          $.each(data.json, function(i,o){
                              serie.push(String(o.x));
                              valor.push(parseFloat(o.y));
                              total.push(parseFloat(o.z));
                              llamar.push(parseFloat(o.a));
                          });

                          var grafico_reag= $('#tblgraficos').highcharts({
                              chart:{
                                  type: 'column',
                                  animation: Highcharts.svg,
                              },
                              title:{text: 'Actividades realizadas'},
                              xAxis:{categories: serie},
                              yAxis: {
                                  min: 0,
                                  title: {
                                      text: 'Actividades realizadas'
                                  },
                                  stackLabels: {
                                      enabled: true,
                                      style: {
                                          fontWeight: 'bold',
                                          color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                                      }
                                  }
                              },
                              legend: { align: 'right',
                                      x: -30,
                                      verticalAlign: 'top',
                                      y: 25,
                                      floating: true,
                                      backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                                      borderColor: '#CCC',
                                      borderWidth: 1,
                                      shadow: false },
                              exporting: { enabled: true },
                              tooltip: {
                                  headerFormat: '<b>{point.x}</b><br/>',
                                  pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                              },
                              plotOptions: {
                                  column: {
                                      stacking: 'normal',
                                      dataLabels: {
                                          enabled: true,
                                          color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                                      }
                                  }
                              },
                              series: [{ name: 'Reagendadas', data:valor },{ name: 'Canceladas', data:total },{ name: 'Volver a llamar', data:llamar }],
                              responsive: {
                                  rules: [{
                                      condition: {
                                          maxWidth: 500
                                      },
                                      chartOptions: {
                                          legend: {
                                              layout: 'horizontal',
                                              align: 'center',
                                              verticalAlign: 'bottom'
                                          }
                                      }
                                  }]
                              }
                          });
                      }else{
                        $('#tblfiltro').html("");
                        $('#tblgraficos').html("");
                      }
                  },
                  error : function(xhr, status) {
                      msg_box_alert(99,'title',xhr.responseText);
                  }
              });
          }
        }

function revisar_produccion_ejecutivos(){
  var fechadesde=document.getElementById("textdesde").value;
  var fechahasta=document.getElementById("texthasta").value;

  if (fechadesde>fechahasta){
      alert("Ingrese fechas validas");
  }else{
      var formd = new FormData();
      formd.append('fechadesde',fechadesde);
      formd.append('fechahasta',fechahasta);
          $.ajax({
                type : 'POST',
                url : 'api/Mdlreagendamiento_mostrarproduccion',
                contentType: false,
                processData: false,
                data: formd,
                success : function(data) {
                          if(data.success==1){
                            $('#tblgestiones').html(data.html);
                            var serie= []; var valor= []; var total=[]; var llamar=[];
                            $.each(data.json, function(i,o){
                              serie.push(String(o.x));
                              valor.push(parseFloat(o.y));
                              total.push(parseFloat(o.z));
                              llamar.push(parseFloat(o.a));
                            });

                            var grafico_reag= $('#tblgestiongraficos').highcharts({
                                chart:{
                                      type: 'column',
                                      animation: Highcharts.svg,
                                      },
                                title:{text: 'Gestiones realizadas'},
                                      xAxis:{categories: serie},
                                      yAxis: {
                                          min: 0,
                                          title: {
                                              text: 'Gestiones realizadas'
                                          },
                                          stackLabels: {
                                              enabled: true,
                                              style: {
                                                  fontWeight: 'bold',
                                                  color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                                              }
                                          }
                                      },
                                      legend: { align: 'right',
                                              x: -30,
                                              verticalAlign: 'top',
                                              y: 25,
                                              floating: true,
                                              backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                                              borderColor: '#CCC',
                                              borderWidth: 1,
                                              shadow: false },
                                      exporting: { enabled: true },
                                      tooltip: {
                                          headerFormat: '<b>{point.x}</b><br/>',
                                          pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                                      },
                                      plotOptions: {
                                          column: {
                                              stacking: 'normal',
                                              dataLabels: {
                                                  enabled: true,
                                                  color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                                              }
                                          }
                                      },
                                      series: [{ name: 'Reagendadas', data:valor },{ name: 'Canceladas', data:total },{ name: 'Volver a llamar', data:llamar }],
                                      responsive: {
                                          rules: [{
                                              condition: {
                                                  maxWidth: 500
                                              },
                                              chartOptions: {
                                                  legend: {
                                                      layout: 'horizontal',
                                                      align: 'center',
                                                      verticalAlign: 'bottom'
                                                  }
                                              }
                                          }]
                                      }
                                  });
                              }else{
                                $('#tblgestiones').html(" ");
                                $('#tblgestiongraficos').html(" ");
                              }
                          },
                          error : function(xhr, status) {
                              msg_box_alert(99,'title',xhr.responseText);
                          }
                      });
                  }
                }

function descargaractividades(){
  var fechadesde=document.getElementById("textdesde").value;
  var fechahasta=document.getElementById("texthasta").value;

  location.href='reagendamiento/descargaractividades?fechadesde='+fechadesde+'&fechahasta='+fechahasta;
}

function descargargestiones(){
  var fechadesde=document.getElementById("textdesde").value;
  var fechahasta=document.getElementById("texthasta").value;

  location.href='reagendamiento/descargargestiones?fechadesde='+fechadesde+'&fechahasta='+fechahasta;
}
