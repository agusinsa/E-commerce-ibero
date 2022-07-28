function agregaRegistro(){
    var url = 'registrar.php';
    $.ajax({
        type:'POST',
        url:url,
        data:$('#formpost').serialize(),
        success: function(registro){
            $('#reg')[0].reset();
            $("#cargando").html(data);
        }
    });
    return false;
}