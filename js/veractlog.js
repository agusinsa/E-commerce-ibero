$(document).ready(function() {

    $("#logear").click(function(e) {
        var userlog = $("#user_log").val();
        var contralog = $("#contra_log").val();
        var ver_envio = $("#ver_envio").val(); //SI ES 1 SE REDIRECCIONA A LA PAGINA DE ENVIO 

        $.ajax({
            type: "post",
            url: "php/loguear.php",
            data: ('user_log=' + userlog + '&clave_log=' + contralog + '&ver_envio=' + ver_envio),
            success: function(respuesta) {
                if (respuesta == 1) {
                    $('#alerta').append('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Cuenta registrada pero no activada</div>');
                }
                if (respuesta == 2) {
                    $(location).attr('href', "?sesion=ok");
                }
                if (respuesta == 3) {
                    $('#alerta').append('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Usuario o Contraseña Incorrectos</div>');
                }
                if (respuesta == 4) {
                    $(location).attr('href', "?sesion=ok&m=carrito");
                }

            }
        });

    });

});