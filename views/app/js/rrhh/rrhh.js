function GetListarAnticipoMes(annomes,mesano){
    $("a > i").removeClass("rojo");
    $("#"+mesano).addClass("rojo");

    $("#input_annomes").val(annomes);
    
    var formData = new FormData();
    formData.append('annomes',annomes);

    $.ajax({
        type: "POST",
        url: "api/GetListarAnticipoMes",
        contentType:false,
        processData:false,
        data : formData,
        success : function(data){
            var table= $('#dataTables4').DataTable();
            table.clear().draw();
            if(data.success==1){
                var ruta="views/app/temp/"+data.message;
                var request = $.ajax(ruta,{dataType:'json'});
                request.done(function (resultado) {
                    table.rows.add(resultado.aaData).draw();
                });
            }
        },
        error : function(xhr, status) {
            msg_box_alert(99,"Error",xhr.responseText);
        }
    });
}
$('#btn_exportar_excel_listado_anticipos').click(function(e) {
    var annomes=document.getElementById('input_annomes').value;
    location.href = 'rrhh/exportar_excel_listado_anticipos?annomes='+annomes;
});
