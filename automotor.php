	<?php

		require "php/conexion.php";
		

		

		$consulta="SELECT p.id, p.nom_prod, p.precio, p.categoria, f.web_path, p.imagenes FROM productos AS p INNER JOIN productos_files as pf ON pf.producto_id=p.id INNER JOIN files AS f ON f.id=pf.file_id where categoria='automotor' GROUP BY p.id ";

		$resultado=mysqli_query($conexion,$consulta);
		

		$artxpag=9;
		$total_art= mysqli_num_rows($resultado);
		$paginas=$total_art/9;
		$paginas=ceil($paginas);//redondea para arriba 


		if($_GET['pagina']>$paginas || $_GET['pagina']<1){
			if($sesion=='ok'){
				header('location:?sesion=ok&m=automotor&pagina=1');
			}else{

			header('location:?m=automotor&pagina=1');
			}
		}


		$iniciar=($_GET['pagina']-1)*$artxpag;
	

		$sql_art="SELECT p.id, p.nom_prod, p.precio, p.categoria, f.web_path, p.imagenes FROM productos AS p INNER JOIN productos_files as pf ON pf.producto_id=p.id INNER JOIN files AS f ON f.id=pf.file_id WHERE categoria='automotor' GROUP BY p.id LIMIT $iniciar,$artxpag ";
		
		$query=mysqli_query($conexion,$sql_art);


	?>
<section class="contenido wrapper">
	<div class="wrap">
		<h1>Escoge un producto</h1>
		<div class="store-wrapper">
			<div class="category_list">
				<a href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=productos&pagina=1" class="category_item" category="all">TODO</a>
				<a href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=hogar&pagina=1" class="category_item" category="hogar">HOGAR Y OBRA</a>
				<a href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=industria&pagina=1" class="category_item" category="industria">INDUSTRIA</a>
				<a href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=automotor&pagina=1" class="category_item" category="automotor">AUTOMOTOR</a> 
			</div>
			<section class="products-list">
				<?php
					while($array=mysqli_fetch_array($query)){
						?>
						<div class='product-item' category="<?php echo $array['categoria'];?>">
							<a href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=prod&pid=<?php echo $array['id'];?>">
							<img src="<?php echo $array['web_path'];?>">
							</a>
							<a id='azu' href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=prod&pid=<?php echo $array['id'];?>">
								<?php echo $array['nom_prod'];  ?>
								<P><b>Precio:$<?php echo $array['precio']; ?></b></p></a>
							  </div>	 
							  <?php 
					}
					 ?>
					
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
						      <a class="page-link" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=automotor&pagina=1" aria-label="Previous">
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
								<a class="page-link" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=automotor&pagina=<?php echo $_GET['pagina']-1; ?>">
									Anterior
								</a>
							</li>
							

							<?php 

							//MOSTRAR MAXIMO DE PAGINAS (PAGINACION)

							// calculamos la primera y última página a mostra
							  $primera = $_GET['pagina'] - ($_GET['pagina'] % 6) + 1;
							  if ($primera > $_GET['pagina'] ) { $primera = $primera - 5; }
							  $ultima = $primera + 5 > $paginas ? $paginas : $primera + 5; 
							




							if ($paginas >= 1) {
            					
           						 
					            // mostramos de la primera a la última
					            for ($i = $primera; $i <=$ultima; $i++){
					                if ($_GET['pagina']  == $i){
					                    echo '<li class="page-item active"><a class="page-link" href="#">'.$_GET['pagina'].'</a></li>';
					                }
					                else{

					                	?>
					                	<li class="page-item"><a class="page-link" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=automotor&pagina=<?php echo $i;?>"><?php echo $i; ?></a></li>

					                	<?php
					            	}	
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
								<a class="page-link" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=automotor&pagina=<?php echo $_GET['pagina']+1; ?>">
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
      							<a class="page-link" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=automotor&pagina=<?php echo $paginas; ?>" aria-label="Next">
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