function crearBitacora(){
    $.ajax({
      type : "POST",
      url : "api/crearBitacora",
      data : $('#form_registro').serialize(),
      success : function(json) {
        if(json.success == 1) {

           location.href = "bitacora";
        }
      },
      error : function(xhr, status) {
        console.log('Ha ocurrido un problema.');
      }
    });
}

function editar(){
    $.ajax({
      type : "POST",
      url : "api/editarBitacora",
      data : $('#form_regi').serialize(),
      success : function(json) {
        if(json.success == 1) {
            location.href = "bitacora/bitacora";
        }
      },
      error : function(xhr, status) {
        console.log('Ha ocurrido un problema.');
      }
    });
}
