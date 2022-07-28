$(document).ready(function() {
    $("#verf_ok").click(function(e) {
        e.preventDefault();
        var hash = $("#check_hash").val();
        var veri_mail = $("#veri_mail").val();
        var mail_ant = $("#mail_viejo").val();

        $.ajax({
            type: "post",
            url: "php/cuenta_verf.php",
            data: ("hash=" + hash + "&=mail_ant" + mail_ant),
            success: function(response) {
                if (response == 3) {
                    alert("Cuenta activada");
                    window.location.href = '?m=regok&mail=' + mail_ant + '&hash=' + hash;
                }
                if (response == 4) {
                    $("#alerta_ver").append('<div class="alert alert-warning col-6" role="alert">La cuenta aún no ha sido activada</div>');
                } else {

                }

            }
        });


    });
});