$(document).ready(function() {
    $("#btn_recuperar").click(function(e) {
        e.preventDefault();
        var recu_contra = $("#recu_contra").val(); //mail de recuperacion
        $.ajax({
            type: "post",
            url: "php/recuperar_contra.php",
            data: ("recu_contra=" + recu_contra), //mal de recuperacions
            success: function(response) {
                if (response == 1) {
                    $("#alerta").append('<div class="alert alert-success col-3"><a href="" class="close" data-dismiss="alert">&times;</a>Correo enviado</div>');
                    $("#recu_contra").val("");
                }
                if (response == 2) {
                    $("#alerta").append('<div class="alert alert-warning col-3"><a href="" class="close" data-dismiss="alert">&times;</a>Cuenta todavia no activada</div><br><p><a href="?m=regok&mail=' + recu_contra +
                        '">Enviar correo de verificación.</a></p>');
                }
                if (response == 3) {
                    $("#alerta").append('<div class="alert alert-danger col-6"><a href="" class="close" data-dismiss="alert">&times;</a>No se ha encontrado una cuenta con éste correo electrónico</div>');
                }

            }
        });

    });
});