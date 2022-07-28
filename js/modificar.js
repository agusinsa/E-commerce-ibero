$(document).ready(function() {

    $('#b_datos').on('click', function(e) {

        var nom = $('#nom_mod').val();
        var ape = $('#ape_mod').val();
        var tel = $('#tel_mod').val();
        var usu = $('#usu_mod').val();



        if (nom != "" && ape != "" && tel != "" && usu != "") {
            $.ajax({
                type: "POST",
                url: "php/modificar1.php",
                data: ('nom_mod=' + nom + '&ape_mod=' + ape + '&tel_mod=' + tel + '&usu_mod=' + usu),
                success: function(respuesta) {
                    if (respuesta == 3) {
                        $('#alerta1').append('<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Datos modificados</div>');
                        $('#nom_mod').focus();
                    }
                }
            })
        }

    })



    /*MODIFICAR CONTRASEÑA*/
    $('#b_contra').on('click', function(e) {

        var clave = $('#clave_mod').val();
        var clave2 = $('#confc_mod').val();


        if (clave != "" && clave2 != "" && clave == clave2) {


            $.ajax({
                type: "POST",
                url: "php/modificar.php",
                data: ('contra_mod=' + clave + '&confc_mod=' + clave2),
                success: function(respuesta) {
                    if (respuesta == 1) {
                        $('#alerta').append('<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Contraseña cambiada correctamente</div>');
                        $('#clave_mod').val("");
                        $('#clave_mod').focus();
                        $('#confc_mod').val("");
                    }
                    if (respuesta == 2) {
                        $('#alerta').append('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>La contraseña ingresada es igual que la actual</div>');
                        $('#clave_mod').val("");
                        $('#clave_mod').focus();
                        $('#confc_mod').val("");

                    }
                }
            })
        }
    })

    $('#b_direcc').on('click', function(e) {
        var direccion = $('#direccion').val();
        var localidad = $('#localidad').val();
        var cp = $('#cp').val();
        var provincia = $('#provincia').val();

        if (direccion != "" && localidad != "" && cp != "" && provincia != "") {
            $.ajax({
                type: "POST",
                url: "php/modificar_dire.php",
                data: ('direccion=' + direccion + '&localidad=' + localidad + '&cp=' + cp + '&provincia=' + provincia),
                success: function(respuesta) {
                    if (respuesta == 4) {
                        $('#alerta2').append('<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Datos cargados correctamente</div>');
                        $('#direccion').focus();
                    }
                }
            })
        }

    })
    $("#verif_mail").click(function(e) {
        e.preventDefault();

        var veri_mail = $("#veri_mail").val();
        var mail_ant = $("#mail_viejo").val();

        if (veri_mail != "") {
            $.ajax({
                type: "post",
                url: "php/modificar_mail_verif.php",
                data: ('mail=' + veri_mail + '&mail_ant=' + mail_ant),
                success: function(response) {
                    if (response == 1) {
                        $("#alerta_ver").append('<div class="alert alert-secondary" role="alert">Correo reenviado</div>');
                        window.setTimeout(function() {
                            window.location.href = '?m=regok&mail=' + veri_mail;
                        }, 2000);

                    } else {
                        $("#alerta_ver").append('');
                    }
                    if (response == 2) {
                        $("#alerta_ver").append('<div class="alert alert-warning" role="alert">Mail en uso</div>');
                    } else {
                        $("#alerta_ver").append('');
                    }

                }
            });
        }

    });
})