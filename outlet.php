
	<?php

		

		$consulta="SELECT p.id, p.nom_prod, p.precio, p.categoria, f.web_path, p.imagenes, p.active FROM productos AS p INNER JOIN productos_files as pf ON pf.producto_id=p.id INNER JOIN files AS f ON f.id=pf.file_id WHERE p.active=1 GROUP BY p.id";

		$resultado=mysqli_query($conexion,$consulta);
		

		$artxpag=9;
		$total_art= mysqli_num_rows($resultado);
		$paginas=$total_art/9;
		$paginas=ceil($paginas);//redondea para arriba 

		if($_GET['pagina']>$paginas || $_GET['pagina']<1){
			header('location:?m=outlet');
		}


		$iniciar=($_GET['pagina']-1)*$artxpag;
	

		$sql_art="SELECT p.id, p.nom_prod, p.precio, p.categoria, p.active, f.web_path, p.imagenes FROM productos AS p INNER JOIN productos_files as pf ON pf.producto_id=p.id INNER JOIN files AS f ON f.id=pf.file_id WHERE p.active=1 GROUP BY p.id LIMIT $iniciar,$artxpag";
		
		$query=mysqli_query($conexion,$sql_art);

	?>
<section class="contenido wrapper">
	<div class="wrap">
		<h1>Productos en oferta</h1>
		<div class="store-wrapper">
			<div class="category_list">
				<a href="?m=productos&pagina=1" class="category_item" category="all">TODO</a>
				<a href="?m=hogar&pagina=1" class="category_item" category="hogar">HOGAR Y OBRA</a>
				<a href="?m=industria&pagina=1" class="category_item" category="industria">INDUSTRIA</a>
				<a href="?m=automotor&pagina=1" class="category_item" category="automotor">AUTOMOTOR</a> 
			</div>
			<section class="products-list">
				<?php
					while($array=mysqli_fetch_array($query)){
						echo "<div class='product-item' category='".$array['categoria']."'>
							<a href='?m=prod&pid=".$array['id']."'>
							<img src='".$array['web_path']."'>
							</a>
							<a id='azu' href='?m=prod&pid=".$array['id']."'>".$array['nom_prod']."<P><b>PRECIO: $".$array['precio']."</b></p></a>
							  </div>";	 
					}
				?>
				<div class="container-fluid">
						<br>
						<center>
							<!--EMPIEZA PAGINADOR / NAV-->
							<nav>
								<ul class="pagination ">
									<li class="page-item
										<?php 
											if($_GET['pagina']<=1){
												echo 'disabled';
											}
										?>
										">
								    	<a class="page-link" href="?m=outlet&pagina=1" aria-label="Previous">
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
										<a class="page-link" href="?m=outlet&pagina=<?php echo $_GET['pagina']-1; ?>">
											Anterior
										</a>
									</li>
							

								<?php 

									//MOSTRAR MAXIMO DE PAGINAS (PAGINACION)

									// calculamos la primera y última página a mostra
								  	$primera = $_GET['pagina'] - ($_GET['pagina'] % 6) + 1;
								  		if ($primera > $_GET['pagina'] ) { $primera = $primera - 5; }
								  		$ultima = $primera + 5 > $paginas ? $paginas : $primera + 5; 
								




									if ($paginas > 1) {
		            					
		           						 
							            // mostramos de la primera a la última
							            for ($i = $primera; $i <=$ultima; $i++){
							                if ($_GET['pagina']  == $i)
							                    echo '<li class="page-item active"><a class="page-link" href="#">'.$_GET['pagina'].'</a></li>';
							                else
							                    echo '<li class="page-item"><a class="page-link" href="?m=outlet&pagina='.$i.'">'.$i.'</a></li>';
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
									<a class="page-link" href="?m=outlet&pagina=<?php echo $_GET['pagina']+1; ?>">
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
	      							<a class="page-link" href="?m=outlet&pagina=<?php echo $paginas; ?>" aria-label="Next">
								        <span aria-hidden="true">&raquo;</span>
								        <span class="sr-only">Ultima</span>
							      </a>
							    </li>						
								</ul>
							</nav>	
							<!--TERMINA PAGINADOR /NAV-->
					</center>
				</div>
			</section>
		</div>
	</div>
</section>
