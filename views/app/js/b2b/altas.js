function subirarchivoexcel() {
    $("#div_cargando").html($("#cargador").html());
    var formData = new FormData();
    formData.append("excel", document.getElementById("blindfile").files[0]);
    $.ajax({
        type: "POST",
        url: "api/cargar_excel_altas",
        contentType: false,
        processData: false,
        data: formData,
        success: function(json) {
            if (json.success == 1) {
                msg_box_alert(json.success,"Registros Guardado",json.message,"reload");
            } else {
                msg_box_alert(json.success, "Error", json.message);
                $("#div_cargando").html(
                    '<a class="btn btn-success btn-social" title="Importar desde Excel" data-toggle="tooltip" onclick="subirarchivoexcel()"><i class="fa fa-arrow-up"></i> Cargar Base</a>'
                );
            }
        },
        error: function(xhr, status) {
            $("#div_cargando").html(
                '<a class="btn btn-success btn-social" title="Importar desde Excel" data-toggle="tooltip" onclick="subirarchivoexcel()"><i class="fa fa-arrow-up"></i> Cargar Base</a>'
            );
            msg_box_alert(99, "Error", xhr.responseText);
        }
    });
}
function carga_modal_datos_tmp_ordenes_altas(){
    $.ajax({
        type: "POST",
        url: "api/getDatosOrdenesTMP_ALTAS",
        success : function(data){
            var table= $('#table_datos_tmp').DataTable();
            table.clear().draw();
            if(data.success==1){
                var ruta="views/app/temp/" + data.message;
                var request = $.ajax( ruta , {dataType:'json'} );
                request.done(function (resultado) {
                    table.rows.add(resultado.aaData).draw();
                });
            }else{
                $.alert(data.message);
            }
        },
        error : function(xhr, status) {
          msg_box_alert(99,'Ver Ordenes',xhr.responseText);
        }
    });
}
function traspasar_Ordenes(base){
    $.ajax({
        type: "POST",
        url: "api/TraspasarsOrdenesTMP_"+base,
        success : function(data){
            if(data.success==1){
                msg_box_alert(data.success,"Registros Guardado",data.message,"reload");
            }else{
                $.alert(data.message);
            }
        },
        error : function(xhr, status) {
          msg_box_alert(99,'Traspasar Ordenes',xhr.responseText);
        }
    });
}
function carga_ordenes_tabla_modal(tabla,clasificacion_pendiente,bloque){
    var formData = new FormData();
    formData.append("tabla", tabla);
    formData.append("clasificacion_pendiente", clasificacion_pendiente);
    formData.append("bloque", bloque);
    $.ajax({
        type: "POST",
        url: "api/getOrdenesSeguimientoAltas",
        contentType: false,
        processData: false,
        data: formData,
        success : function(data){
            var table= $('#table_ordenes_pendientes_altas').DataTable();
            table.clear().draw();
            if(data.success==1){
                var ruta="views/app/temp/" + data.message;
                var request = $.ajax( ruta , {dataType:'json'} );
                request.done(function (resultado) {
                    table.rows.add(resultado.aaData).draw();
                });
            }else{
                $.alert(data.message);
            }
        },
        error : function(xhr, status) {
          msg_box_alert(99,'Ver Ordenes',xhr.responseText);
        }
    });
}
function execute_accion_confirmacion(method,api_rest,formulario,accion,accion_redirect){
    switch(api_rest) {
        case "master_register_motivopendiente":
            title='Registra Nuevo Motivo Pendiente';
        break;
        case "master_editar_motivopendiente":
            title='Modificar  Motivo Pendiente';
        break;
        case "master_register_motivoincumplimiento":
            title='Registra Nuevo Motivo Pendiente';
        break;
        case "master_editar_motivoincumplimiento":
            title='Modificar  Motivo Pendiente';
        break;
    }
    $.ajax({
        type : method,
        url : 'api/'+api_rest,
        data : $('#'+ formulario).serialize(),
        success : function(json) {
            msg_box_alert(json.success,title,json.message,accion,accion_redirect);
        },
        error : function(xhr, status) {
            msg_box_alert(99,title,xhr.responseText);
        }
    });
}
$('#register_motivopendiente').click(function(e) {
    e.defaultPrevented;
    execute_accion_confirmacion("POST","master_register_motivopendiente",'register_motivopendiente_form','redirect','b2b/listar_motivopendiente');
});
$('#update_motivopendiente').click(function(e) {
    e.defaultPrevented;
    execute_accion_confirmacion("POST","master_editar_motivopendiente",'editar_motivopendiente_form','redirect','b2b/listar_motivopendiente');
});
$('#register_motivoincumplimiento').click(function(e) {
    e.defaultPrevented;
    execute_accion_confirmacion("POST","master_register_motivoincumplimiento",'register_motivoincumplimiento_form','redirect','b2b/listar_motivoincumplimiento');
});
$('#update_motivoincumplimiento').click(function(e) {
    e.defaultPrevented;
    execute_accion_confirmacion("POST","master_editar_motivoincumplimiento",'editar_motivoincumplimiento_form','redirect','b2b/listar_motivoincumplimiento');
});
function updateEstadoOrdenAltas(id){
    var formData = new FormData();
    formData.append("id", id);
    formData.append("estado", $('#motivopendiente-'+id).val());
    formData.append("observacion", $('#observacion-'+id).val());

    $.ajax({
        type: "POST",
        url: "api/updateEstadoOrdenAltas",
        contentType: false,
        processData: false,
        data: formData,
        success: function(json) {
            if (json.success == 0) {
                msg_box_alert(json.success, "Error", json.message);
            }
            selectBloqueHoySeguimiento();
        },
        error: function(xhr, status) {
            msg_box_alert(99, "Error", xhr.responseText);
        }
    });
}
function selectBloqueHoySeguimiento(){
    var formData = new FormData();
    formData.append("bloque", $('#select_bloque_hoy').val());
    //alert(document.getElementById("select_bloque_hoy").selected)
    $.ajax({
        type: "POST",
        url: "api/selectBloqueHoySeguimiento",
        contentType: false,
        processData: false,
        data: formData,
        success: function(json) {
            if (json.success == 1) {
                $("#div_hoy").html(json.message);
            }else{
                $("#div_hoy").html("");
            }
        },
        error: function(xhr, status) {
            msg_box_alert(99, "Error", xhr.responseText);
        }
    });
}
function operacionFinalAltas(id){
    $.confirm({
        title: 'Está segur@ de ejecutar esta acción?',
        content: "",
        type: 'blue',
        buttons: {
            formSubmit: {
                text: 'Aceptar',
                btnClass: 'btn-green',
                action: function () {

                    var formDatas = new FormData();
                    formDatas.append("id", id);
                    formDatas.append("operacion", $('#operacion-'+id).val());
                    formDatas.append("estado", $('#motivopendiente-'+id).val());
                    formDatas.append("observacion", $('#observacion-'+id).val());

                    $.ajax({
                        type: "POST",
                        url: "api/operacionFinalAltas",
                        contentType: false,
                        processData: false,
                        data: formDatas,
                        success : function(data){
                            if(data.success==1){
                                $.confirm({
                                    title: data.message,
                                    content: data.html,
                                    type: 'blue',
                                    columnClass: 'col-lg-6',
                                    buttons: {
                                        formSubmit: {
                                            text: 'Aceptar',
                                            btnClass: 'btn-green',
                                            action: function () {
                                                formDatas.append("cumplimiento", $('#select_cumplimiento').val());
                                                formDatas.append("observacion_cumple", $('#observacion_cumplimiento').val());
                                                formDatas.append("motivo", $('#select_motivoincumplimiento').val());

                                                $.ajax({
                                                    type: "POST",
                                                    url: "api/operacionFinalAltas_Finalizar",
                                                    contentType: false,
                                                    processData: false,
                                                    data: formDatas,
                                                    success : function(json){
                                                        if(json.success==1){
                                                            msg_box_alert(1, "Finalizar Orden", json.message);

                                                            $('#operacion-'+id).attr("disabled",'true')
                                                            selectBloqueHoySeguimiento();
                                                        }else{
                                                            $('#operacion-'+id).val("PENDIENTE");
                                                            msg_box_alert(99, "Error", json.message);
                                                        }

                                                    },
                                                    error : function(xhr, status) {
                                                      msg_box_alert(99,'Ver Ordenes',xhr.responseText);
                                                    }
                                                });

                                            }
                                        },cancel: {
                                            text: 'Cancelar',
                                            action: function () {
                                                $('#operacion-'+id).val("PENDIENTE");
                                            }
                                        }
                                    }
                                });
                            }else if(data.success==2){
                                msg_box_alert(0, "Anular Orden", data.message);

                                $('#operacion-'+id).attr("disabled",'true')
                                selectBloqueHoySeguimiento();
                            }
                        },
                        error : function(xhr, status) {
                          msg_box_alert(99,'Ver Ordenes',xhr.responseText);
                        }
                    });
                }
            },cancel: {
                text: 'Cancelar',
                action: function () {
                    $('#operacion-'+id).val("PENDIENTE")
                }
            }
        }
    });

}
function showselectmotivoincumplimiento(){
    var x = document.getElementById('select_motivoincumplimiento');
    if (document.getElementById('select_cumplimiento').value == "CUMPLE"){
        x.style.display = 'none';
    } else {
        x.style.display = 'inherit';
    }
}
function exporta_excel_b2b_Altas_hoy(reporte,filtro,filtro2){
    location.href = 'b2b/exporta_excel_b2b_Altas_hoy?reporte='+reporte+'&filtro='+filtro+'&filtro2='+filtro2;
}
