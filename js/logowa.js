
//cuando el objeto este cargado se ejecute la funcion 
$(document).ready(function(){
var $flotante = $('#waflotante');
	$flotante.hide();
	$(window).scroll(function(){//funcion para detectar scroll en la pantalla
		if( $(this).scrollTop()> 0){ //cuando bajemos con el mouse agrega clase en este caso "header2"
			$flotante.show();
		}else{//sino remueve clase
			$flotante.hide();
		}
	});
});