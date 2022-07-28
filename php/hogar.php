<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pintureria Iberoamericana</title>


	<link rel="icon" href="imagenes/logo_prueba.jpg">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/buscador.css">
	<link rel="stylesheet" href="css/hover_cat.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/producto.css">

	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap.min.js">
	<link rel="stylesheet" href="footer.css">

	<link rel="stylesheet" href="productos/css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	
	
	<link href="bootstrap-3.3.7/docs/examples/carousel/carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="css/logowa.css">
	<!--Bootstrap-->
	<link href="bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">
	<!---->
	<link href="bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/header.js"></script>
	<script src="js/logowa.js"></script>
	<script src="js/prod.js"></script>

	<script src="productos/js/jquery-3.2.1.js"></script>
	<script src="productos/js/script.js"></script>

	<script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>


	

</head>
<body>
	<?php
	require "php/conexion.php";
	session_start();
	?>

	<header>
		<div class="">
			<div class="logo">
				<a href="index.php"><img src="imagenes\Logo_mod2.jpg"></a>
			</div>
			<div>
				<form id="fromu">
					<input id="busca" type="search" name="busc" class="redondeado" placeholder="Buscar...">
				</form>
			</div>
			<div class="ella"><a href="compras.php"><img class="carrito" src="imagenes/107831.png"></a></div>
			<div class="usu">
				<?php
				if(!isset($_SESSION['user']) and !isset($_SESSION['user2'])){
				echo "<a href='login.PHP'>Iniciar Sesión</a> | <a href='registro.php'>Crear Cuenta</a>"	;
				}
				else{
					echo $_SESSION['user']." ".$_SESSION['user2']." ";
					echo "|   <a href='php/salir.php'>Salir</a>";
				}
			?>	
			</div>
				<div>
					<nav id="nave">
						<a href="index.php">Inicio</a>
						<a href="Productos.php?pagina=1">Productos</a>
						<a href="Outlet.php">Outlet</a>
						<a href="Contacto.php">Contacto</a>
					</nav>
				</div>
		</div>
	</header>
	<?php

		require "../php/conexion.php";
		

		

		$consulta="SELECT * FROM productos";

		$resultado=mysqli_query($conexion,$consulta);
		

		$artxpag=9;
		$total_art= mysqli_num_rows($resultado);
		$paginas=$total_art/9;
		$paginas=ceil($paginas);//redondea para arriba 


		if($_GET['pagina']>$paginas || $_GET['pagina']<1){
			header('location:Productos.php?pagina=1');
		}


		$iniciar=($_GET['pagina']-1)*$artxpag;
	

		$sql_art="SELECT * From productos LIMIT $iniciar,$artxpag";
		
		$query=mysqli_query($conexion,$sql_art);

	?>
<section class="contenido wrapper">
	<div class="wrap">
		<h1>Escoge un producto</h1>
		<div class="store-wrapper">
			<!-- <div class="contenedor-menu">
				<ul class="menu">
					<li><a href="#">TODO</a></li>
					<li><a href="#">HOGAR Y OBRA</a></li>
					<li><a href="#">AUTOMOTOR</a></li>
					<li><a href="#">INDUSTRIA</a></li>
				
				</ul>
			</div> -->
			<div class="category_list">
				<a href="#" class="category_item" category="all">TODO</a>
				<a href="#" class="category_item" category="hogar">HOGAR Y OBRA</a>
				<a href="#" class="category_item" category="industria">INDUSTRIA</a>
				<a href="#" class="category_item" category="automotor">AUTOMOTOR</a> 
				<!-- <a href="#" class="category_item" category="Barnices">Barnices</a>
				<a href="#" class="category_item" category="accesorios">Accesorios</a>
				<a href="#" class="category_item" category="audifonos">monitores</a> -->
			</div>
			<section class="products-list">
				<?php

					while($array=mysqli_fetch_array($query)){
						echo "<div class='product-item' category='".$array['categoria']."'>
							<a href='prod.php?pid=".$array['cod_prod']."'>
							<img src='".$array['imagenes']."'>
							</a>
							<a id='azu' href='prod.php?pid=".$array['cod_prod']."'>".$array['nom_prod']."<P><b>PRECIO: $".$array['precio']."</b></p></a>
							  </div>";	 
					}
					?>

				<!-- <div class="product-item" category="hogar">
					<img src="imagenes\productos\01.jpg" alt="" >
					<a href="prod.php?pid=01">Alba Baños y Cocinas Latex Blanco x 1L</a>
				</div>
				<div class="product-item" category="hogar">
					<img src="imagenes\productos\01.jpg" alt="" >
					<a href="prod.php?pid=02">Alba Baños y Cocinas Latex Blanco x 4L</a>
				</div>
				<div class="product-item" category="hogar">
					<img src="imagenes\productos\01.jpg" alt="" >
					<a href="prod.php?pid=03">Alba Baños y Cocinas Latex Blanco x 20L</a>
				</div>
				<div class="product-item" category="AUTOMOTOR">
					<img src="productos/images/barnizcristalba.jpg" alt="" >
					<a href="#">Barniz Cristalba</a>
				</div>
				<div class="product-item" category="AUTOMOTOR">
					<img src="productos/images/espatula.jpg" alt="" >
					<a href="#">espatula</a>
				</div>
				<div class="product-item" category="AUTOMOTOR">
					<img src="productos/images/espatula.jpg" alt="" >
					<a href="#">espatula</a>
				</div>
				<div class="product-item" category="AUTOMOTOR">
					<img src="productos/images/espatula.jpg" alt="" >
					<a href="#">espatula</a>
				</div> -->
				<div class="container-fluid">
					<br>
					<center>
					<nav>
						<ul class="pagination ">
							<li class="page-item
							<?php 
							if($_GET['pagina']<=1){
								echo 'disabled';
							}
							?>
							">
						      <a class="page-link" href="Productos.php?pagina=1" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						        <span class="sr-only">Primera</span>
						      </a>
    						</li>
							<li class="page-item
							<?php 
							if($_GET['pagina']<=1){
								echo 'disabled';
							}
							?>
							">
								<a class="page-link" href="Productos.php?pagina=<?php echo $_GET['pagina']-1; ?>">
									Anterior
								</a>
							</li>
							

							<?php 

							//MOSTRAR MAXIMO DE PAGINAS (PAGINACION)

							// calculamos la primera y última página a mostra
							  $primera = $_GET['pagina'] - ($_GET['pagina'] % 10) + 1;
							  if ($primera > $_GET['pagina'] ) { $primera = $primera - 10; }
							  $ultima = $primera + 9 > $paginas ? $paginas : $primera + 9; 
							




							if ($paginas > 1) {
            					
           						 
					            // mostramos de la primera a la última
					            for ($i = $primera; $i <=$ultima; $i++){
					                if ($_GET['pagina']  == $i)
					                    echo '<li class="active"><a href="#">'.$_GET['pagina'].'</a></li>';
					                else
					                    echo '<li><a href="productos.php?pagina='.$i.'">'.$i.'</a></li>';
					            }

					           
       						 }
        					?>

							 <li class="page-item
							 <?php 
							 	if($_GET['pagina']==$paginas){
									echo 'disabled';
							}
							 ?>
							 ">
								<a class="page-link" href="Productos.php?pagina=<?php echo $_GET['pagina']+1; ?>">
									Siguiente
								</a>
							</li>	
							<li class="page-item
							 <?php 
							 	if($_GET['pagina']>=$paginas){
									echo 'disabled';
							}
							 ?>
							 ">
      							<a class="page-link" href="Productos.php?pagina=<?php echo $paginas; ?>" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							        <span class="sr-only">Ultima</span>
						      </a>
						    </li>						
						</ul>
					</nav>
					</center>
				</div>
			</section>
		</div>
	</div>
	</section>

	<!-- Footer -->
	<section id="footer" class="sectio">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Contactanos</h5>
					<ul class="list-unstyled quick-links">
						<li> <a><img class tele src="imagenes/ubicacion.png" height="20px" width="20px">Direccion:Uruguay 422, Pilar</a></li>
						<li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3289.913501210972!2d-58.91017768520064!3d-34.454343557115955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc9cda60b40aa1%3A0x19a57c6b1da78ed6!2sPinturer%C3%ADa%20Iberoamericana!5e0!3m2!1ses-419!2sar!4v1577490467741!5m2!1ses-419!2sar" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe></li>
						<li><a><i class="fa fa-angle-double-right"></i><img class="tele"src="imagenes/arroba.png">Email: iberoamericana01@gmail.com</a></li>
						<li><a><i class="fa fa-angle-double-right"></i><img class="tele" src="imagenes/telefono.png">Telefono: 0230-4421905</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>IBEROAMERICANA</h5>
					<ul class="list-unstyled quick-links">
						<a href="javascript:void();"><i class="fa fa-angle-double-right"></i>LA EMPRESA</a></li>
						<a href="javascript:void();"><i class="fa fa-angle-double-right"></i>
Con más de 55 años de experiencia como distribuidor mayorista y minorista de pinturas, somos una de las cadenas más completas del país.
Siempre te ofrecemos todos los materiales que necesitas para dar vida a tus proyectos.
Actualmente contamos con 13 sucursales en CABA y GBA.</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Medios de Pago</h5>
					<div id="mdp">
					<img src="imagenes/tarjetas.png" class="imgRedonda" alt="tarjetas" height="100%" width="100%">
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
	
	<!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap-3.3.7/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>