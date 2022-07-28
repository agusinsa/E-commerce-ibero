<?php

		require "php/conexion.php";

		$idp=$_GET['pid'];

		$sql="SELECT p.id, p.nom_prod, p.marca, p.vendidos, p.precio, p.descripcion, p.formato, f.web_path, p.imagenes FROM productos AS p INNER JOIN productos_files as pf ON pf.producto_id=p.id INNER JOIN files AS f ON f.id=pf.file_id WHERE p.id='$idp' GROUP BY p.id";

		$consulta=mysqli_query($conexion,$sql);
		$array=mysqli_fetch_array($consulta);

		?>
<head>
	<style>
		
		h5{
			font-size: 14px !important;
		}
		h6{
			font-size: 12px !important;
		}
	</style>
</head>
 <body>
        <div class="container" style="padding-top: 5%;">
        	<div class="row">
               <div class="col-sm-4 item-photo">
                    <img style="max-width:100%; width: ;" src="<?php echo $array['web_path']?>" />
                </div>
                <div class="col col-xs-8" style="border:0px solid gray; padding-top: 5%;">
                    <!-- Datos del vendedor y titulo del producto -->
                    <div style="width: 60%;font-size: 160%;"><?php echo $array['nom_prod']; ?></div>    
                    <h5 style="color:#337ab7">vendido por <a href="#"><?php echo $array['marca']; ?></a> · <small style="color:#337ab7">(<?php echo $array['vendidos']; ?> ventas)</small></h5>
        
                    <!-- Precios -->
                    <h6 class="title-price" style="width:60%;"><small>PRECIO OFERTA</small></h6>
                    <div style="margin-top:0px; font-size:24px;">$ <?php echo $array['precio']; ?></div>
        
                    <!-- Detalles especificos del producto -->
                    <div class="section col-sm-5">
                        <h6 class="title-attr" style="margin-top:15px;" ><small>COLOR</small></h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>
                    <?php if($array['formato']!=""){ ?>
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>FORMATO</small></h6>                    
                        <div>
                            <div class="attr2"><?php echo $array['formato']; ?></div>
                        </div>
                    </div>   
                <?php } ?>
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>CANTIDAD</small></h6>                    
                        <div>
                            <div class="btn-minus"><i class="fa fa-minus" aria-hidden="true"></i></div>
                            <input value="1" id="cantidadProducto" />
                            <div class="btn-plus"><i class="fa fa-plus" aria-hidden="true"></i></div>
                        </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                      <!-- <a href="?m=compras">    -->
                             <button class="btn btn-success col-sm-6"
                             data-id="<?php echo $idp;?>"
                             data-nombre="<?php echo $array['nom_prod'];?>"
                             data-web_path="<?php echo $array['web_path'];?>"
                             data-precio="<?php echo $array['precio'];?>">
                                 <span style="margin-right:20px" class="fa fa-shopping-cart" aria-hidden="true"></span> Agregar al carro
                             </button>
                       </a> 
                        <h6><a href="#"><i class="fa fa-heart-o" style="cursor:pointer;margin-top: 5px;"></i>Agregar a lista de deseos</a></h6>
                    </div>                                        
                </div>                              
        
                <div class="col-sm-9">
                    <ul class="menu-items" style="cursor: pointer;">
                        <li class="active">Detalle del producto</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
                            <?php echo $array['descripcion']; ?>
                            </small>
                        </p>
                    </div>
                </div>		
            </div>
        </div>        
    </body>
</html>