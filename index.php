<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1, user-scalable=no"/>
	<title>Pintureria Iberoamericana</title>
  <!--ICONO-->
  <link rel="icon" href="imagenes/logo_prueba.jpg">

  <!--CSS-->
  <link rel="stylesheet" href="css/contacto.css">
  <link rel="stylesheet" href="css/main.css"/>
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/buscador.css">
  <link rel="stylesheet" href="css/hover_cat.css">
  <link rel="stylesheet" href="css/prod.css">
  <link rel="stylesheet" href="css/producto.css">
  <link rel="stylesheet" href="css/productos.css">
  <link rel="stylesheet" href="css/logowa.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/carousel.css">
  <link rel="stylesheet" href="css/simple-sidebar.css" >
  <link rel="stylesheet" href="css/tablaCarrito.css">

	
  <!-- BOOTSTRAP CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  

	
	<!--Bootstrap JS-->
  <script src="https://kit.fontawesome.com/ec125e9a23.js" crossorigin="anonymous"></script>
	
	<!--JQUERY-->
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/jquerymain.js"></script>	

  <script src="http://code.jquery.com/jquery-latest.js"></script><script src="js/jquery.js"></script>
  <script src="buscador/js/jquery.dataTables.min.js"></script>
	
	
	
  <!--JS-->
  <script src="js/busca.js"></script>
  <script src="js/prod.js"></script>
  <script src="js/header.js"></script>
  <script src="js/logowa.js"></script>
  <script src="js/validarlog.js"></script>
  <script src="js/validarForm.js"></script>
  <script src="js/validareg.js"></script>
  <script src="js/modusu.js"></script>
  <script src="js/modificar.js"></script>
  <script src="js/carrito.js"></script>
  <script src="js/envio.js"></script>
  <script src="js/veractlog.js"></script>
  <script src="js/cuenta_verf.js"></script>
  <script src="js/recuperar.js"></script>
  <script src="js/camb_contra.js"></script>
  
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 
<!--PRODUCT DETAILS-->


  <?php

  	$m=$_GET['m']??'';



  	if($m=="productos"){
  		echo '<script src="js/productos.js"></script>';
  	}

  	if($m=="hogar"){
  		echo '<script src="js/hyo.js"></script>';
  	}

  	if($m=="industria"){
  		echo '<script src="js/ind.js"></script>';
  	}
  	if($m=="automotor"){
  		echo '<script src="js/auto.js"></script>';
  	}
  	if($m=="hogar"){
  		echo '<script src="js/hyo.js"></script>';
  	}

  ?>

</head>
<body>
	<?php
	
	require "php/conexion.php";
	$m=$_GET['m']??'';

	 
   include_once("header.php");

   if($m=="" || $m=='inicio'){
    include_once("php/inicio.php");
   }
   if($m=="productos"){
    include_once("productos.php");
   }
   if($m=="prod"){
    include_once("prod.php");
   }
   if($m=="automotor"){
    include_once("automotor.php");
   }
   if($m=="industria"){
    include_once("industria.php");
   }
   if($m=="hogar"){
    include_once("hogar.php");
   }
   if($m=="compras"){
    include_once("compras.php");
   }
   if($m=="contacto"){
    include_once("contacto.php");
   }
   if($m=="outlet"){
    include_once("outlet.php");
   }
  if($m=="login"){
    include_once("login.php");
   }
   if($m=="login2"){
    include_once("login2.php");
   }
    if($m=="registro"){
    include_once("registro.php");
   }
   if($m=="regok"){
    include_once("regus.php");
   }
   if($m=="usuario"){
    include_once("usuario.php");
   }
    if($m=="buscar"){
    include_once("buscar.php");
   }
   if($m=="carrito"){
    include_once("compras.php");
   }
   if($m=="envio"){
    include_once("envios.php");
   }
   if($m=="pago"){
    include_once("pagar.php");
   }
   if($m=="recuperar"){
     include_once("recuperar.php");
   }
   if($m=="camb_contra"){
     include_once("recu_contra.php");
   }
   if($m=="checkout"){
     include_once("checkout.php");
   }
    

	?>
		

	<!-- Footer -->
	<section id="footer" class="sectio">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Contactanos</h5>
					<ul class="list-unstyled quick-links">
						<li> <a><i class="fa fa-search"></i>Dirección:Uruguay 422, Pilar</a></li>
						<li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3289.913501210972!2d-58.91017768520064!3d-34.454343557115955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc9cda60b40aa1%3A0x19a57c6b1da78ed6!2sPinturer%C3%ADa%20Iberoamericana!5e0!3m2!1ses-419!2sar!4v1577490467741!5m2!1ses-419!2sar" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe></li>
						<li><a><i class="fa fa-at" aria-hidden="true"></i>Email: iberoamericana01@gmail.com</a></li>
						<li><a><i class="fa fa-phone" aria-hidden="true"></i>Telefono: 0230-4421905</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>IBEROAMERICANA</h5>
					<ul class="list-unstyled quick-links">
						<a href="javascript:void();"><i class="fa fa-angle-double-right"></i>LA EMPRESA</a></li>
						<a href="javascript:void();"><i class="fa fa-angle-double-right"></i>
Con más de 10 años de experiencia en distribución de pinturas, somos una empresa con cobertura en los segmentos de, Hogar y Obra, Automotor e Industria.
</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Medios de Pago</h5>
					<div id="mdp">
					<img src="imagenes/tarjetas.png" class="imgRedonda" alt="tarjetas">
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u>© 2019 COPYRIGHT PINTURERIA IBEROAMERICANA</u></p>
					<p class="h6"><a class="text-green ml-2" href="" target="_blank">&copy Desarrollado por Pancho&InsaCorp</a></p>
				</div>
				</hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->  
    <!--DATATABLE-->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/search.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $('#logo').click(function(e){
      var sesion=$("#sesion").val();
      if(sesion=='ok'){
        window.location.href = "?sesion=ok&m=inicio";
      }else{
        window.location.href = "?m=inicio";
      }
    
  });
  </script>
</body>
</html>