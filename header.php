<?php
    $m=$_GET['m']??'';
    require "php/conexion.php"; 
    $sesion="";
    if(isset($_REQUEST['sesion'])){
      $sesion=$_REQUEST['sesion'];
      if($_REQUEST['sesion']=='ok'){
         session_start(); 
      }
    }
?>
    <div class="d-flex" id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="nave">
        <img src="imagenes/logo_mod2.jpg" id="logo" class="img-nav" alt="logo" style="cursor: pointer;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="float: left;">
             <!--BUSCADOR-->
            <form action="?m=buscar" method="GET">
             <div class="flex_search busca">
                <input type="text" name="<?php if($sesion=='ok'){echo 'sesion';}?>" value="<?php if($sesion=='ok'){echo 'ok';}?>" id="<?php if($sesion=='ok'){echo 'sesion';}?>" hidden="">
                <input type="text" name="" value="buscar" id="modulo" hidden="">
                <input type="text" name="m" value="buscar" id="modulo1" hidden="">
                <input type="text" name="pagina" value="1" id="pagina" hidden="">
                <input  class="busq" type="text" value="" name="busq" id="busq" placeholder="Buscar..." class="input_search" autocomplete="off">
                <button class="fa fa-search button_search no_link"></button>
              </div>
            </form>
            <div class="content-search">
                            <div class="content-table">
                                <table id="table">
                                    <thead>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $art_bus="SELECT p.id, p.nom_prod, p.precio, f.web_path, p.imagenes FROM productos AS p INNER JOIN productos_files as pf ON pf.producto_id=p.id INNER JOIN files AS f ON f.id=pf.file_id GROUP BY p.id";
                                        $res_bus=mysqli_query($conexion,$art_bus);

                                        while($bus_prod=mysqli_fetch_array($res_bus)){
                                          ?>
                                          <tr>
                                            <td><a href="?<?php 
                                            if($sesion=='ok'){
                                              echo 'sesion=ok&';
                                            } 
                                            echo "m=prod&pid=".$bus_prod['id']
                                            ?>" style="float:right;"><?php echo $bus_prod['nom_prod']?><img src="<?php echo $bus_prod['imagenes']?>" style="width:20%; height:20%;float:left;">
                                            </a></td>
                                          </tr>

                                          
                                                <?php
                                        }


                                         ?>
                                       
                                    </tbody>
                                </table>
                            </div>
            </div>
            <!--/BUSCADOR-->
            <li class="nav-item">
              <a class="nav-link" id="nav" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=inicio">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="nav" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=productos&pagina=1">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="nav" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=outlet&pagina=1">Outlet</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="nav" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=contacto">Contacto</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php
                if(!isset($_SESSION['user']) and !isset($_SESSION['user2'])){
                  echo '<i class="fa fa-user" id="links" aria-hidden="true"></i>';
                }else{
                  echo '<i class="fas fa-user-check" id="links" aria-hidden="true"></i>';
                }
              ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" id="dropdown-login" aria-labelledby="navbarDropdown">
                <?php
                if(!isset($_SESSION['user']) and !isset($_SESSION['mail'])){
                  echo '<a class="dropdown-item" id="dropdown-login" href="?m=login">Iniciar Sesión<i class="fa fa-sign-in float-right" aria-hidden="true"></i></a>
                        <a class="dropdown-item" id="dropdown-login"  href="?m=registro">Registrarse<i class="fa fa-id-card float-right" aria-hidden="true"></i></a>';
                }else{
                       echo '<a class="dropdown-item" id="dropdown-login" href="?sesion=ok&m=usuario">'.$_SESSION['user'].'<i class="fa fa-user float-right"></i></a>
                        <a class="dropdown-item float-left" id="saliryborrar" href="php/salir.php">Cerrar Sesión<i class="fa fa-ban text-danger float-right"></i></a>';
                    }
                 ?>
              </div>
            </li>
           <!--CARRITO -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" style="color:white;" href="#" id="iconoCarrito">
                <i class="fa fa-shopping-cart"></i>
                <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">
              </div>              
            </li>
            <!--FIN CARRITO-->
          </ul>
        </div>
       </nav>
      </div>
    </div> 