function validarLog() {
    var formu = document.logi;


    if (formu.user_log.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Nombre de Usuario</div>';
        formu.usu_log.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = "";
    }

    if (formu.contra_log.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Contraseña</div>';
        formu.contra_log.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = "";
    }


}