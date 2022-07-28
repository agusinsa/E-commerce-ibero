$(document).ready(function() {
    $('#regs').on('click', function(e) {
        e.preventDefault();

        var nombre = $('#nom').val();
        var apellido = $('#ape').val();
        var dni = $('#dni').val();
        var tel = $('#tel').val();
        var direccion = $('#direccion').val();
        var localidad = $('#localidad').val();
        var cp = $('#cp').val();
        var provincia = $('#provincia').val();
        var mail = $('#mail').val();
        var usuario = $('#usu').val();
        var clave = $('#clave').val();
        var clave2 = $('#confc').val();
        var act = $('#tact').val();


        if (nombre != "" && apellido != "" && dni != "" && tel != "" && usuario != "" && clave != "" && clave2 != "" & act != "" && clave == clave2) {

            $.ajax({
                type: "POST",
                url: "php/registrar.php",
                data: ('nom=' + nombre + '&ape=' + apellido + '&dni=' + dni + '&tel=' + tel + '&direccion=' + direccion + '&localidad=' + localidad + '&cp=' + cp + '&provincia=' + provincia + '&mail=' + mail + '&usu=' + usuario + '&clave=' + clave + '&confc=' + clave2 + '&act=' + act),
                success: function(respuesta) {
                    if (respuesta == 1) {
                        alert("Registrado");
                        $(location).attr('href', '?m=regok&mail=' + mail);
                    }
                    if (respuesta == 2) {
                        $('#alerta').append('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>DNI ya retgistrado</div>');
                        $('#dni').focus();
                        $('#dni').val("");
                    }
                    if (respuesta == 3) {
                        $('#alerta').append('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Mail en uso</div>');
                        $('#mail').focus();
                        $('#mail').val("");

                    } else {
                        if (respuesta == 4) {
                            $('#alerta').append('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Nombre de usuario no disponible</div>');
                            $('#usu').focus();
                            $('#usu').val("");

                        }
                    }
                },
                error: function() {
                    alert("nose porque pero no te anda maestro");
                }
            })
        }
    })
})





// if($('#nom').val()==""){

//   $('#nom').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }

// if($('#ape').val()==""){

//   $('#ape').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }

// if($('#dni').val()==""){

//   $('#dni').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }

// if($('#tel').val()==""){

//   $('#tel').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }

// if($('#mail').val()==""){

//   $('#mail').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }

//  if($('#usu').val()==""){

//   $('#usu').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }
//  if($('#clave').val()==""){

//   $('#clave').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }
//  if($('#confc').val()==""){

//   $('#confc').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }
//  if($('#tact').val()==""){

//   $('#tact').focus();
//   return false;
// }else{
//   $('#alerta').append('');
// }

// form.submit();