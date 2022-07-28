function validarreg() {
    var form = document.registr;
    var clave1 = form.clave.value;
    var clave2 = form.confc.value;

    if (form.nom.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese nombre</div>';
        form.nom.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.ape.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Apellido</div>';
        form.ape.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.dni.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Dni</div>';
        form.dni.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.tel.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Teléfono</div>';
        form.tel.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.mail.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Correo Electrónico</div>';
        form.mail.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.usu.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Nombre de Usuario</div>';
        form.usu.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.clave.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese Contraseña</div>';
        form.clave.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.confc.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Confirmar Contraseña</div>';
        form.confc.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (form.act.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Seleccione Actividad</div>';
        form.act.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }

    if (clave1 != clave2) {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Las Contraseñas no Coinciden</div>';
        form.act.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
        return true;
    }


    form.submit();
}

//instanciamos el elemento input

function capitalizarPrimeraLetraR() {

    String.prototype.capitalize = function() {
        return this.replace(/(^|\s)([a-z])/g, function(m, p1, p2) { return p1 + p2.toUpperCase(); });
    };

    //Ejemplo de uso
    var input = document.getElementById('nom');
    var miString = input.value;
    input.value = miString.capitalize();

    var input = document.getElementById('ape');
    var miString = input.value;
    input.value = miString.capitalize();

    var input = document.getElementById('direccion');
    var miString = input.value;
    input.value = miString.capitalize();

    var input = document.getElementById('localidad');
    var miString = input.value;
    input.value = miString.capitalize();

}
