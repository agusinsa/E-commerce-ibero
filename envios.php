<?php
if(isset($_REQUEST['total_compra'])){
  $total=$_REQUEST['total_compra'];
}
if(isset($_SESSION['id'])){
  $iduser=$_SESSION['id'];
  if(isset($_POST['guardar'])){
    $telCli=mysqli_real_escape_string($conexion, $_REQUEST['tel_cli']??'');
    $dirCli=mysqli_real_escape_string($conexion, $_REQUEST['dir_cli']??'');
    $locCli=mysqli_real_escape_string($conexion, $_REQUEST['loc_cli']??'');
    $cpCli=mysqli_real_escape_string($conexion, $_REQUEST['cp_cli']??'');
    $provCli=mysqli_real_escape_string($conexion, $_REQUEST['prov_cli']??'');
    
    $queryCli="UPDATE usuarios SET tel='$telCli', direccion='$dirCli', localidad='$locCli', cp='$cpCli', provincia='$provCli' WHERE id='$iduser' ";
    $resCli=mysqli_query($conexion,$queryCli);

    $nomRec=mysqli_real_escape_string($conexion, $_REQUEST['nom_rec']??'');
    $telRec=mysqli_real_escape_string($conexion, $_REQUEST['tel_rec']??'');
    $dirRec=mysqli_real_escape_string($conexion, $_REQUEST['dir_rec']??'');
    $locRec=mysqli_real_escape_string($conexion, $_REQUEST['loc_rec']??'');
    $cpRec=mysqli_real_escape_string($conexion, $_REQUEST['cp_rec']??'');
    $provRec=mysqli_real_escape_string($conexion, $_REQUEST['prov_rec']??'');
    $queryRec="INSERT INTO recibe (idcliente,nombre,tel,direccion,localidad,cp,provincia) VALUES ('$iduser','$nomRec','$telRec','$dirRec','$locRec','$cpRec', '$provRec')
        ON DUPLICATE KEY UPDATE
        nombre='$nomRec',tel='$telRec',direccion='$dirRec',localidad='$locRec',cp='$cpRec',provincia='$provRec'; ";
    $resRec=mysqli_query($conexion,$queryRec);

      if($resCli && $resRec){
        /*echo '<meta http-equiv="refresh" content="0; url=?sesion=ok&m=pago&total_compra="'.$total.'" />';*/
        ?>
        <meta http-equiv="refresh" content="0; url=?sesion=ok&m=pago&total_compra=<?php echo $total;?>" />
        <?php 
      }else{
        ?>
          <div div class="alert alert-danger" role="alert">
            Error
          </div>
      <?php     
        }
    }
   /*  $queryCli="SELECT nombre, tel, direccion, localidad, cp, provincia FROM usuarios WHERE id='".$_SESSION['idcliente']."' ";
    $resCli=mysqli_query($con,$queryCli);
    $rowCli=mysqli_fetch_assoc($resCli); */
    ?>
<?php

  $usu=$_SESSION['user'];

  $sql="SELECT * From usuarios WHERE usuario='$usu'";
  $query=mysqli_query($conexion,$sql);
  $array=mysqli_fetch_array($query);

  $queryRec="SELECT nombre, tel, direccion, localidad, cp, provincia FROM recibe WHERE id='".$_SESSION['id']."' ";
  $resRec=mysqli_query($conexion,$queryRec);
  $rowRec=mysqli_fetch_assoc($resRec);
  

  ?>
<script>
  
</script>
  <section class="wrapper"> 
     <div class="well well-sm">
        <div class="text-center" style="margin-bottom: 5%;"><h1>Datos de envío</h1></div>    
          <div class="col-md-6 float-left" >
             <h2 style="margin-bottom: 4%;">Datos del Cliente</h2>
                <div id="alerta1">
                  <form method="POST" name="envio">
                  <input type="hidden" name="total_compra" id="total_compra">
                        <div class="col-md-10">
                            <p><label>Nombre y apellido:</label>
                            <input 
                            class="form-control" 
                            type="text" 
                            name="nom_cli" 
                            id="nom_cli" 
                            value="<?php echo $array['nombre']." ".$array['apellido']?>"
                            readonly="readonly">
                        </div>
                        <div class="col-md-10">
                            <label>Teléfono:</label>
                            <p>
                            <input 
                            class="form-control" 
                            type="text" 
                            name="tel_cli" 
                            id="tel_cli" 
                            value="<?php echo $array['tel']?>"
                            >
                        </div>
                        <div class="col-md-10">
                            <label>Dirección:</label>
                            <p>
                            <input 
                            class="form-control" 
                            type="text" 
                            name="dir_cli" 
                            id="dir_cli" 
                            value="<?php echo $array['direccion']?>"
                            required>
                        </div>
                        <div class="col-md-10 col-sm">
                            <label>Localidad:</label>
                            <p>
                            <input 
                            class="form-control" 
                            type="text" 
                            name="loc_cli" 
                            id="loc_cli" 
                            value="<?php echo $array['localidad']?>">
                        </div>
                        <div class="col-md-10 col-sm">
                            <label>Código postal:</label>
                            <p>
                            <input 
                            class="form-control" 
                            type="text" 
                            name="cp_cli" 
                            id="cp_cli" 
                            value="<?php echo $array['cp']?>">
                        </div>
                        <div class="col-md-10 col-sm">
                            <p>
                            <label>Provincia:</label>
                                <select name="prov_cli" id="prov_cli" class="select-css" tabindex="8">
                                  <option value="Buenos Aires"<?php if($array['provincia']=="Buenos Aires"){echo "selected";}?>>Buenos Aires</option>
                                  <option value="Catamarca"<?php if($array['provincia']=="Catamarca"){echo "selected";}?>>Catamarca</option>
                                  <option value="Chaco"<?php if($array['provincia']=="Chaco"){echo "selected";}?>>Chaco</option>
                                  <option value="Chubut"<?php if($array['provincia']=="Chubut"){echo "selected";}?>>Chubut</option>
                                  <option value="Cordoba"<?php if($array['provincia']=="Cordoba"){echo "selected";}?>>Cordoba</option>
                                  <option value="Corrientes"<?php if($array['provincia']=="Corrientes"){echo "selected";}?>>Corrientes</option>
                                  <option value="Entre Rios"<?php if($array['provincia']=="Entre Rios"){echo "selected";}?>>Entre Rios</option>
                                  <option value="Formosa"<?php if($array['provincia']=="Formosa"){echo "selected";}?>>Formosa</option>
                                  <option value="Jujuy"<?php if($array['provincia']=="Jujuy"){echo "selected";}?>>Jujuy</option>
                                  <option value="La Pampa"<?php if($array['provincia']=="La Pampa"){echo "selected";}?>>La Pampa</option>
                                  <option value="La Rioja"<?php if($array['provincia']=="La Rioja"){echo "selected";}?>>La Rioja</option>
                                  <option value="Mendoza"<?php if($array['provincia']=="Mendoza"){echo "selected";}?>>Mendoza</option>
                                  <option value="Misiones"<?php if($array['provincia']=="Misiones"){echo "selected";}?>>Misiones</option>
                                  <option value="Neuquen"<?php if($array['provincia']=="Neuquen"){echo "selected";}?>>Neuquen</option>
                                  <option value="Rio Negro"<?php if($array['provincia']=="Rio Negro"){echo "selected";}?>>Rio Negro</option>
                                  <option value="Salta"<?php if($array['provincia']=="Salta"){echo "selected";}?>>Salta</option>
                                  <option value="San Juan"<?php if($array['provincia']=="San Juan"){echo "selected";}?>>San Juan</option>
                                  <option value="San Luis"<?php if($array['provincia']=="San Luis"){echo "selected";}?>>San Luis</option>
                                  <option value="Santa Cruz"<?php if($array['provincia']=="Santa Cruz"){echo "selected";}?>>Santa Cruz</option>
                                  <option value="Santa Fe"<?php if($array['provincia']=="Santa Fe"){echo "selected";}?>>Santa Fe</option>
                                  <option value="Sgo. del Estero"<?php if($array['provincia']=="Sgo. del Estero"){echo "selected";}?>>Sgo. del Estero</option>
                                  <option value="Tierra del Fuego"<?php if($array['provincia']=="Tierra del Fuego"){echo "selected";}?>>Tierra del Fuego</option>
                                  <option value="Tucuman"<?php if($array['provincia']=="Tucuman"){echo "selected";}?>>Tucuman</option>
                               </select>
                        </div>
                      </div>
                    </div>
                      <div class="col-md-6 float-right">
                        <h2 style="margin-bottom: 4%;">¿Quién recibe?</h2>
                          <div class="col-md-10">
                              <p><label>Nombre y apellido:</label>
                              <input 
                              class="form-control" 
                              type="text" 
                              name="nom_rec" 
                              id="nom_rec" 
                              value="<?php echo $rowRec['nombre']?>"
                              required>
                          </div>
                          <div class="col-md-10">
                              <label>Teléfono:</label>
                              <p>
                              <input 
                              class="form-control" 
                              type="text" 
                              name="tel_rec" 
                              id="tel_rec" 
                              value="<?php echo $rowRec['tel']?>"
                              required>
                          </div>
                          <div class="col-md-10">
                              <label>Dirección:</label>
                              <p>
                              <input 
                              class="form-control" 
                              type="text" 
                              name="dir_rec" 
                              id="dir_rec" 
                              value="<?php echo $rowRec['direccion']?>"
                              required>
                          </div>
                          <div class="col-md-10 col-sm">
                              <label>Localidad:</label>
                              <p>
                              <input 
                              class="form-control" 
                              type="text" 
                              name="loc_rec" 
                              id="loc_rec" 
                              value="<?php echo $rowRec['localidad']?>"
                              required>
                          </div>
                          <div class="col-md-10 col-sm">
                              <label>Código postal:</label>
                              <p>
                              <input 
                              class="form-control" 
                              type="text" 
                              name="cp_rec" 
                              id="cp_rec" 
                              value="<?php echo $rowRec['cp']?>"
                              required>
                          </div>
                          <div class="col-md-10 col-sm">
                              <p>
                              <label>Provincia:</label>
                                  <select name="prov_rec" id="prov_rec" class="select-css" tabindex="8">
                                    <option value="Buenos Aires"<?php if($rowRec['provincia']=="Buenos Aires"){echo "selected";}?>>Buenos Aires</option>
                                    <option value="Catamarca"<?php if($rowRec['provincia']=="Catamarca"){echo "selected";}?>>Catamarca</option>
                                    <option value="Chaco"<?php if($rowRec['provincia']=="Chaco"){echo "selected";}?>>Chaco</option>
                                    <option value="Chubut"<?php if($rowRec['provincia']=="Chubut"){echo "selected";}?>>Chubut</option>
                                    <option value="Cordoba"<?php if($rowRec['provincia']=="Cordoba"){echo "selected";}?>>Cordoba</option>
                                    <option value="Corrientes"<?php if($rowRec['provincia']=="Corrientes"){echo "selected";}?>>Corrientes</option>
                                    <option value="Entre Rios"<?php if($rowRec['provincia']=="Entre Rios"){echo "selected";}?>>Entre Rios</option>
                                    <option value="Formosa"<?php if($rowRec['provincia']=="Formosa"){echo "selected";}?>>Formosa</option>
                                    <option value="Jujuy"<?php if($rowRec['provincia']=="Jujuy"){echo "selected";}?>>Jujuy</option>
                                    <option value="La Pampa"<?php if($rowRec['provincia']=="La Pampa"){echo "selected";}?>>La Pampa</option>
                                    <option value="La Rioja"<?php if($rowRec['provincia']=="La Rioja"){echo "selected";}?>>La Rioja</option>
                                    <option value="Mendoza"<?php if($rowRec['provincia']=="Mendoza"){echo "selected";}?>>Mendoza</option>
                                    <option value="Misiones"<?php if($rowRec['provincia']=="Misiones"){echo "selected";}?>>Misiones</option>
                                    <option value="Neuquen"<?php if($rowRec['provincia']=="Neuquen"){echo "selected";}?>>Neuquen</option>
                                    <option value="Rio Negro"<?php if($rowRec['provincia']=="Rio Negro"){echo "selected";}?>>Rio Negro</option>
                                    <option value="Salta"<?php if($rowRec['provincia']=="Salta"){echo "selected";}?>>Salta</option>
                                    <option value="San Juan"<?php if($rowRec['provincia']=="San Juan"){echo "selected";}?>>San Juan</option>
                                    <option value="San Luis"<?php if($rowRec['provincia']=="San Luis"){echo "selected";}?>>San Luis</option>
                                    <option value="Santa Cruz"<?php if($rowRec['provincia']=="Santa Cruz"){echo "selected";}?>>Santa Cruz</option>
                                    <option value="Santa Fe"<?php if($rowRec['provincia']=="Santa Fe"){echo "selected";}?>>Santa Fe</option>
                                    <option value="Sgo. del Estero"<?php if($rowRec['provincia']=="Sgo. del Estero"){echo "selected";}?>>Sgo. del Estero</option>
                                    <option value="Tierra del Fuego"<?php if($rowRec['provincia']=="Tierra del Fuego"){echo "selected";}?>>Tierra del Fuego</option>
                                    <option value="Tucuman"<?php if($rowRec['provincia']=="Tucuman"){echo "selected";}?>>Tucuman</option>
                                </select>
                              </div>
                              <div class="form-check mb-5">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="cargar_env" id="cargar_env">
                                  Cargar datos del cliente
                                </label>
                              </div>
                            </div>
                          </div style="padding-top: 150%;">
                        </center>
                      </section>
                      <div class="mb-5">
                      <a class="btn btn-primary ml-5 mb-5 mr-5 col float-left" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=carrito" role="button" style="width:15%;">Volver al carrito</a>
                      <button type="submit" class="btn btn-success mb-5 mr-5 col float-right" name="guardar" value="guardar" style="width:15%;">Proceder al pago</button>
                    </div>
                </form>
<?php
}else{
?>
<section class="wrapper">
<div class="mt-5 mb-5 ml-5 text-center">
Para continuar debe <a href="?m=login&compra=ok&s=1">Iniciar sesión</a> o <a href="?m=registro">Registrarse</a>
</div>
</section>
<?php 
}
?>
