function modContra() {
    var contra = document.con;

    if (contra.clave_mod.value == "") {
        contra.clave_mod.focus();
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese contraseña</div>';
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }
    if (contra.confc_mod.value == "") {
        contra.confc_mod.focus();
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Confirme contraseña</div>';
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
    }
    if (contra.confc_mod.value != contra.clave_mod.value) {
        contra.confc_mod.focus();
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Las contraseñas no coinciden</div>';
        return false;
    } else {
        document.getElementById("alerta").innerHTML = '';
        return true;

    }

    return true;
    con.submit();
}

function modUsu() {
    var datos = document.datos;

    if (datos.nom_mod.value == "") {
        datos.nom_mod.focus();
        document.getElementById("alerta1").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese nombre</div>';
        return false;
    } else {
        document.getElementById("alerta1").innerHTML = '';
    }
    if (datos.ape_mod.value == "") {
        datos.ape_mod.focus();
        document.getElementById("alerta1").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese apellido</div>';
        return false;
    } else {
        document.getElementById("alerta1").innerHTML = '';
    }
    if (datos.tel_mod.value == "") {
        datos.tel_mod.focus();
        document.getElementById("alerta1").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese teléfono</div>';
        return false;
    } else {
        document.getElementById("alerta1").innerHTML = '';
    }
    if (datos.usu_mod.value == "") {
        datos.usu_mod.focus();
        document.getElementById("alerta1").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingrese nombre de usuario</div>';
        return false;
    } else {
        document.getElementById("alerta1").innerHTML = '';
    }
    return true;
    datos.submit();
}

function capitalizarPrimeraLetra() {

    String.prototype.capitalize = function() {
        return this.replace(/(^|\s)([a-z])/g, function(m, p1, p2) { return p1 + p2.toUpperCase(); });
    };

    //Ejemplo de uso
    var input = document.getElementById('nom_mod');
    var miString = input.value;
    input.value = miString.capitalize();

    var input = document.getElementById('ape_mod');
    var miString = input.value;
    input.value = miString.capitalize();

    var input = document.getElementById('direccion');
    var miString = input.value;
    input.value = miString.capitalize();

    var input = document.getElementById('localidad');
    var miString = input.value;
    input.value = miString.capitalize();

}