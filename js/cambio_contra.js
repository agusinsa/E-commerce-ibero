$(document).ready(function() {
    $("#cambio_contra").click(function(e) {
        e.preventDefault();
        var n_contra = $("#nueva_contra").val();
        var r_contra = $("#rep_contra");

        if (n_contra == "" || r_contra == "") {
            $("#alerta_ver").append('<div class="alert alert-danger" role="alert">Complete los dos campos</div>');
        } else {
            $("#alerta_ver").append('');
        }

        $.ajax({
            type: "post",
            url: "php/recu_contra",
            data: ("nueva_contra=" + n_contra + "&rep_contra=" + r_contra),
            success: function(response) {
                if (response == 1) {
                    $("#alerta_ver").append('<div class="alert alert-succsess" role="alert">Contraseña cambiada</div>');
                }
                if (response == 2) {
                    $("#alerta_ver").append('<div class="alert alert-danger" role="alert">Las contraseñas no coinciden</div>');
                }

            }
        });

    });
});