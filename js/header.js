//cuando el objeto este cargado se ejecute la funcion 
$(document).ready(function() {

    $(window).scroll(function() { //funcion para detectar scroll en la pantalla
        if ($(this).scrollTop() > 0) { //cuando bajemos con el mouse agrega clase en este caso "header2"
            $('header').addClass('header2');
        } else { //sino remueve clase
            $('header').removeClass('header2');
        }
    });
});