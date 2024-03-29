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
                        ok: function() {
                            $("#" + json.id).css("border-color", "red");
                            $("#" + json.id).focus();
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
                if (json.idActv != "") {
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
                                    "escalamiento/agregarEscalamientoNoCorresponde/" +
                                    json.idActv
                            }
                        }
                    });
                } else {
                    $.alert({
                        icon: "fa fa-warning",
                        title: "Se ha guardado un registro de la actividad mal enviada",
                        content: "Registro remitente y Actividad Mal Enviada",
                        type: "green",
                        typeAnimated: true,
                        autoClose: "ok|3000",
                        buttons: {
                            ok: function() {
                                location.href = "escalamiento/escalamiento";
                            }
                        }
                    });
                }
            } else if (json.success == 3) {
                $.alert({
                    icon: "fa fa-warning",
                    title: "agregar Actividad",
                    content: json.message,
                    type: "green",
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
        case "pendiente":
            $("#home")
                .find("h3")
                .text("Detalle Pendientes");
            var cols = new Array(
                "Fecha Ingreso",
                "Fecha Compromiso",
                "Rut",
                "Id Actividad",
                "Comuna Actividad",
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [8],

                    mRender: function(data, type, full) {
                        if (full[8] == null) {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        } else {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" disabled  title="Ya Tengo Gestión" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        }
                    }
                }]
            });
            mostrarDesdeHasta();
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [8],
                    mRender: function(data, type, full) {
                        if (full[8] == null) {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        } else {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" disabled title="Ya tengo una gestión" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        }
                    }
                }]
            });
            mostrarDesdeHasta();
            break;

        case "escalamientoForzado":
            $("#home")
                .find("h3")
                .text("Actividades Forzadas");
            var cols = new Array(
                "Id Actividad",
                "Rut Cliente",
                "Estado Orden",
                "Creador",
                "Observación",
                "Remitente",
                "Gestion",
                "Acciones"
            );
            $.each(cols, function(index, value) {
                $("#t1")
                    .find("thead > tr")
                    .append("<th>" + value + "</th>");
            });
            $("#t1").dataTable({
                ajax: {
                    url: "api/actividadesForzadas",
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [7],
                    mRender: function(data, type, full) {

                        if (full[6] == null) {
                            return (
                                '<input type="button" class="btn btn-warning" onclick="agregarGestionForzada(\'' +
                                full[0] +
                                '\')" value="Agregar Gestión">'
                            );
                        } else {
                            return (
                                '<input type="button" class="btn btn-warning" disabled onclick="agregarGestionForzada(\'' +
                                full[5] +
                                '\')" value="Agregar Gestión">'
                            );
                        }
                    }
                }]
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
                "mi Gestión",
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [9],
                    mRender: function(data, type, full) {
                        return (
                            '<input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                            full[3] +
                            '\')" value="Visualizar">'
                        );
                    }
                }]
            });
            mostrarDesdeHasta();
            break;

        case "noCorresponde":
            $("#home")
                .find("h3")
                .text(" Detalle Actividades no corresponden");
            var cols = new Array(
                "Id Actividad",
                "Fecha Ingreso",
                "Fecha Finalización",
                "Remitente",
                "Creador",
                "Observación",
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [6],
                    mRender: function(data, type, full) {
                        return (
                            '<input type="button" class="btn btn-danger" onclick="cambiarEstadoActividadNoCorresponde(\'' +
                            full[0] +
                            '\')" value="Forzar"> <input type="button" class="btn btn-info" onclick="visualizarActividadNoCorresponde(\'' +
                            full[0] +
                            '\')" value="Visualizar">'
                        );
                    }
                }]
            });
            mostrarDesdeHasta();
            break;

        case "compromisoHoyMañana":
            $("#home")
                .find("h3")
                .text(" Compromisos Hoy Mañana");
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
                "Estado Orden",
                "Acciones"
            );
            $.each(cols, function(index, value) {
                $("#t1")
                    .find("thead > tr")
                    .append("<th>" + value + "</th>");
            });
            $("#t1").dataTable({
                ajax: {
                    url: "api/compromisoHoyMañana",
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [10],
                    mRender: function(data, type, full) {
                        return (
                            '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividadNoCorresponde(\'' +
                            full[0] +
                            '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividadNoCorresponde(\'' +
                            full[0] +
                            '\')" value="Visualizar">'
                        );
                    }
                }]
            });
            mostrarDesdeHasta();
            break;

        case "porVencer":
            $("#home")
                .find("h3")
                .text("Detalle Actividades por vencer (Bloque)");
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
                    url: "api/actividadesPorVencer",
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [8],

                    mRender: function(data, type, full) {
                        return (
                            '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                            full[3] +
                            '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividadNoCorresponde(' +
                            full[0] +
                            ')" value="Visualizar">'
                        );
                    }
                }]
            });
            break;

        case "xVencerCompromiso":
            $("#home")
                .find("h3")
                .text("Detalle Compromisos por vencer (Bloque)");
            var cols = new Array(
                "Fecha Ingreso",
                "Fecha Compromiso",
                "Rut",
                "Id Actividad",
                "Comuna",
                "Remitente",
                "Bloque",
                "Tipo de Actividad",
                "Hora compromiso",
                "Acciones"
            );
            $.each(cols, function(index, value) {
                $("#t1")
                    .find("thead > tr")
                    .append("<th>" + value + "</th>");
            });
            $("#t1").dataTable({
                ajax: {
                    url: "api/compromisosPorVencer",
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [9],

                    mRender: function(data, type, full) {
                        return (
                            '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                            full[3] +
                            '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividadNoCorresponde(' +
                            full[0] +
                            ')" value="Visualizar">'
                        );
                    }
                }]
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
Funcion encargada de modificar estado actividad
*/

function cambiarEstadoActividad(idActividad) {
    var formData = new FormData();
    formData.append("idActividad", idActividad);

    $.confirm({
        title: "Desea cambiar el estado",
        content: '<form class="form-horizontal" method="POST">' +
            "<div>" +
            "<label>Ingrese Cambio De Estado</label>" +
            "<select id='estados' class='form-control'><option value='finalizada'>Finalizada</option><option value='pendiente'>Pendiente</option><option value='seguimiento'>Seguimiento</option></select>" +
            "</div>" +
            "</form>",
        buttons: {
            Confirmar: function() {
                var x = $("#estados option:selected").val();
                $.confirm({
                    title: "Seguro que desea Realizar este cambio?",
                    content: "La actividad cambiara a estado " + x,
                    buttons: {
                        Cancelar: function() {
                            $.alert("Acaba de cancelar los cambios");
                            location.reload();
                        },
                        confirmar: function() {
                            formData.append("estado", x),
                                $.ajax({
                                    type: "POST",
                                    url: "api/cambiarEstadoActividad",
                                    contentType: false,
                                    processData: false,
                                    data: formData,
                                    success: function(data) {
                                        if (data.success == 1) {
                                            $.confirm({
                                                title: "Cambio Exitoso",
                                                content: data.message,

                                                buttons: {
                                                    Ok: function() {
                                                        location.reload();
                                                    }
                                                }
                                            });
                                        } else {
                                            $.confirm({
                                                escapeKey: "formSubmit",
                                                icon: "glyphicon glyphicon-remove",
                                                title: "Error al Modificar Actividad",
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
                                    }
                                });
                        }
                    }
                });
            },
            Rechazar: function() {
                $.alert("Ha rechazado el cambio");
            }
        }
    });
}

function cambiarEstadoActividadNoCorresponde(idActividad) {
    var formData = new FormData();
    formData.append("idActividad", idActividad);
    $.confirm({
        title: "Desea Forzar La Actividad?",
        content: "",
        type: "green",
        buttons: {
            Confirmar: function() {
                $.confirm({
                    title: "Seguro que desea forzar la Actividad?",
                    content: "",
                    type: "red",
                    buttons: {
                        Cancelar: function() {
                            $.alert("Acaba de Rechazar el Forzar");
                            return false;
                        },
                        confirmar: function() {
                            $.ajax({
                                type: "POST",
                                url: "api/cambiarEstadoActividadNoCorresponde",
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function(data) {
                                    if (data.success == 1) {
                                        $.confirm({
                                            title: "Cambio Exitoso",
                                            content: "",
                                            buttons: {
                                                Ok: function() {
                                                    location.reload();
                                                }
                                            }
                                        });
                                    } else {
                                        $.confirm({
                                            escapeKey: "formSubmit",
                                            icon: "glyphicon glyphicon-remove",
                                            title: "Error al Forzar",
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
                                }
                            });
                        }
                    }
                });
            },
            Rechazar: function() {
                $.alert("Ha rechazado el cambio");
            }
        }
    });
}

function agregarGestion(idActividad) {
    var formData = new FormData();
    formData.append("idActividad", idActividad);
    $.confirm({
        title: "Cuál fue tu gestión?",
        content: '<form class="form-horizontal" method="POST">' +
            "<div>" +
            "<label>Ingrese Gestión</label>" +
            "<textarea id='agregarGestion' cols='20' class='form-control'></textarea>" +
            "</div>" +
            "</form>",
        buttons: {
            Confirmar: function() {
                var x = $("#agregarGestion").val();
                $.confirm({
                    title: "Cuál fue su gestión?",
                    content: "Se guardará este mensaje  " + x,
                    buttons: {
                        Cancelar: function() {
                            $.alert("Acaba de cancelar los cambios");
                            location.reload();
                        },
                        confirmar: function() {
                            formData.append("mensaje", x);
                            $.ajax({
                                type: "POST",
                                url: "api/agregarGestion",
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function(data) {
                                    if (data.success == 1) {
                                        $.confirm({
                                            title: "Cambio Exitoso",
                                            content: "",

                                            buttons: {
                                                Ok: function() {
                                                    location.reload();
                                                }
                                            }
                                        });
                                    } else {
                                        $.confirm({
                                            escapeKey: "formSubmit",
                                            icon: "glyphicon glyphicon-remove",
                                            title: "Error al agregar Su Gestión",
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
                                }
                            });
                        }
                    }
                });
            },
            Rechazar: function() {
                $.alert("Ha rechazado el cambio");
            }
        }
    });
}

function mostrarDesdeHasta() {
    $(".dt-buttons").append(
        '<label style="margin-left:30px;" for="desde">Desde:</label><input style="margin:0px 10px;" type="date" id="fechaInicio" class="fechaInicio">'
    );
    $(".dt-buttons").append(
        '<label style="margin-left:30px;" for="hasta">Hasta:</label><input style="margin:0px 10px;" type="date" id="fechaFin" class="fechaFin">'
    );
    $(".dt-buttons").append(
        '<button class="btn btn-primary" onclick="betweenFechas();">Buscar</button>'
    );
}

function betweenFechas() {
    var fechaInicio = document.getElementById("fechaInicio").value;
    var fechaFin = document.getElementById("fechaFin").value;
    var valorTab = $(".nav-tabs")
        .find(".active")
        .children()
        .attr("class");

    if (fechaInicio > fechaFin) {
        $.confirm({
            escapeKey: "formSubmit",
            icon: "glyphicon glyphicon-list-alt",
            title: "Error ingreso Parametros Fecha",
            columnClass: "medium",
            content: "Fecha Inicial no puede ser mayor a la fecha Final",
            type: "red",
            buttons: {
                formSubmit: {
                    text: "Aceptar",
                    btnClass: "btn-default",
                    action: function() {}
                }
            }
        });
        return false;
    }

    //lineas para limpiar el datatable
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

    switch (valorTab) {
        case "pendiente":
            $("#home")
                .find("h3")
                .text("Ordenes Pendientes Desde " + fechaInicio + " Hasta " + fechaFin);
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
                    url: "api/betweenFechas",
                    type: "POST",
                    //envío de datos hacia el modelo
                    data: {
                        fechaInicio: fechaInicio,
                        fechaFin: fechaFin,
                        valorTab: valorTab
                    }
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [8],
                    mRender: function(data, type, full) {
                        if (full[8] == null) {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        } else {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" disabled  title="Ya Tengo Gestión" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        }
                    }
                }]
            });
            mostrarDesdeHasta();
            break;

        case "seguimiento":
            $("#home")
                .find("h3")
                .text(
                    "Ordenes Seguimiento Desde " + fechaInicio + " Hasta " + fechaFin
                );
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
                    url: "api/betweenFechas",
                    type: "POST",
                    //envío de datos hacia el modelo
                    data: {
                        fechaInicio: fechaInicio,
                        fechaFin: fechaFin,
                        valorTab: valorTab
                    }
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [8],
                    mRender: function(data, type, full) {
                        console.log(full[8]);
                        if (full[8] == null) {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        } else {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" disabled  title="Ya Tengo Gestión" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        }
                    }
                }]
            });
            mostrarDesdeHasta();
            break;

        case "finalizada":
            $("#home")
                .find("h3")
                .text(
                    "Ordenes Finalizadas Desde " + fechaInicio + " Hasta " + fechaFin
                );
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
                    url: "api/betweenFechas",
                    type: "POST",
                    //envío de datos hacia el modelo
                    data: {
                        fechaInicio: fechaInicio,
                        fechaFin: fechaFin,
                        valorTab: valorTab
                    }
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [8],
                    mRender: function(data, type, full) {
                        if (full[8] == null) {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        } else {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" disabled  title="Ya Tengo Gestión" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        }
                    }
                }]
            });
            break;

        case "noCorresponde":
            $("#home")
                .find("h3")
                .text(
                    "Ordenes No Corresponden Desde " + fechaInicio + " Hasta " + fechaFin
                );
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
                    url: "api/betweenFechas",
                    type: "POST",
                    //envío de datos hacia el modelo
                    data: {
                        fechaInicio: fechaInicio,
                        fechaFin: fechaFin,
                        valorTab: valorTab
                    }
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
                buttons: [{
                    extend: "excel",
                    text: ""
                }],
                aoColumnDefs: [{
                    aTargets: [8],
                    mRender: function(data, type, full) {
                        if (full[8] == null) {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        } else {
                            return (
                                '<input type="button" class="btn btn-success" onclick="cambiarEstadoActividad(\'' +
                                full[3] +
                                '\')" value="Estado"> <input type="button" class="btn btn-info" onclick="visualizarActividad(\'' +
                                full[3] +
                                '\')" value="Visualizar"><input type="button" class="btn btn-warning" disabled  title="Ya Tengo Gestión" onclick="agregarGestion(\'' +
                                full[3] +
                                '\')" value="Agregar Gestión">'
                            );
                        }
                    }
                }]
            });
            break;

        default:
            break;
    }
}

function bloquearIdActividad(dato) {
    if (dato == "sinActividad") {
        $('#idActividadManual').val('');
        $('#idActividadManual').attr('readOnly', 'true');

    } else {
        $('#idActividadManual').removeAttr('disabled');
    }

}

function forzarActividad(idActividad) {
    var formData = new FormData();
    formData.append('idActividadForzada', idActividad);

    $.ajax({
        type: "POST",
        url: "api/forzarActividad",
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

function agregarGestionForzada(idActividad) {
    var formData = new FormData();
    formData.append("idActividad", idActividad);

    $.confirm({
        title: "Cuál fue tu gestión?",
        content: '<form class="form-horizontal" method="POST">' +
            "<div>" +
            "<label>Ingrese Gestión</label>" +
            "<textarea id='agregarGestionForzada' cols='20' class='form-control'></textarea>" +
            "</div>" +
            "</form>",
        buttons: {
            Confirmar: function() {
                var x = $("#agregarGestionForzada").val();
                $.confirm({
                    title: "Cuál fue su gestión?",
                    content: "Se guardará este mensaje  " + x,
                    buttons: {
                        Cancelar: function() {
                            $.alert("Acaba de cancelar los cambios");
                            location.reload();
                        },
                        confirmar: function() {
                            formData.append("mensaje", x);
                            $.ajax({
                                type: "POST",
                                url: "api/agregarGestionForzada",
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function(data) {
                                    if (data.success == 1) {
                                        $.confirm({
                                            title: "Gestión Agregada Satisfactoriamente",
                                            content: "",

                                            buttons: {
                                                Ok: function() {
                                                    location.reload();
                                                }
                                            }
                                        });
                                    } else {
                                        $.confirm({
                                            escapeKey: "formSubmit",
                                            icon: "glyphicon glyphicon-remove",
                                            title: "Error al agregar Su Gestión",
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
                                }
                            });
                        }
                    }
                });
            },
            Rechazar: function() {
                $.alert("Ha rechazado el cambio");
            }
        }
    });
}

$(document).ready(function() {
    $(".pendiente").click();
    //si existe el elemento realizara esta gestion
    if ($("#tabla").length == 1) {
        cargarTabla("pendiente");
    }

    $("input, select, textarea").on("keydown", function(e) {
        if ($(this).css("border-color") == "rgb(255, 0, 0)") {
            $(this).css("border-color", "rgb(210, 214, 222)");
        }
        if (e.keyCode == 8) {
            if ($(this).val().length < 2) {
                $(this).css("border-color", "red");
            }
        }
    });

});