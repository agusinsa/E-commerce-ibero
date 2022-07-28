$(document).ready(function() {
    $("#cambio_contra").click(function(e) {
        e.preventDefault();

        var n_contra = $("#nueva_contra").val();
        var r_contra = $("#rep_contra").val();
        var mail = $("#mail").val();
        if (n_contra == r_contra) {
            $.ajax({
                type: "post",
                url: "php/camb_contra.php",
                data: ("n_contra=" + n_contra + "&r_contra=" + r_contra + "&mail=" + mail),
                success: function(response) {
                    if (response == 1) {
                        $("#alerta").append('<div class="alert alert-success col-6"><a href="" class="close" data-dismiss="alert">&times;</a>Contraseña reestablecida</div>');
                        alert("Volver al inicio");
                        window.location.href = "?m=inicio";
                    }
                    if (response == 2) {
                        $("#alerta").append('<div class="alert alert-danger col-6"><a href="" class="close" data-dismiss="alert">&times;</a>Error al cambiar contraseña</div>');
                    }
                }
            });
        } else {
            $("#alerta").append('<div class="alert alert-danger col-6"><a href="" class="close" data-dismiss="alert">&times;</a>Las contraseñas no coinciden</div>');
        }

        if (n_contra == "" || r_contra == "") {
            $("#alerta").append('<div class="alert alert-danger col-6"><a href="" class="close" data-dismiss="alert">&times;</a>Complete los campos</div>');
            $("#nueva_contra").focus();
        } else {
            $("#alerta").append('');
        }
    });
});