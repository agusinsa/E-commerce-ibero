<?php

  $usu=$_SESSION['user'];

  $sql="SELECT * From usuarios WHERE usuario='$usu'";
  $query=mysqli_query($conexion,$sql);
  $array=mysqli_fetch_array($query);
  

  ?>
<script>
  
</script>
  <section class="wrapper"> 
      <center>  
    <div class="well well-sm">
      <div style="margin-bottom: 5%;"><h1>Modificar datos del usuario</h1></div>    
      </center>
      <div class="col-md-6 float-left" >
        <h2 style="margin-bottom: 4%;">Datos Personales</h2>
        <div id="alerta1">
        </div>
          <form action="php/modificar1.php" method="POST" name="datos">
            <div class="col-md-10">
            <p><label>Nombre:</label>
              <input 
              class="form-control" 
              type="text" 
              name="nom_mod" 
              id="nom_mod" 
              value="<?php echo $array['nombre']?>"
              onkeyup="capitalizarPrimeraLetra();">
            </div>
            <div class="col-md-10">
            <label>Apellido:</label>
            <p>
             <input 
             class="form-control" 
             type="text" 
             name="ape_mod" 
             id="ape_mod" 
             value="<?php echo $array['apellido']?>"
             onkeyup="capitalizarPrimeraLetra();">
            </div>
            <div class="col-md-10">
            <label>Dni:</label>
            <p>
            <input 
            class="form-control" 
            type="text" 
            name="dni_mod" 
            id="dni_mod" 
            value="<?php echo $array['dni']?>"
            disabled>
            </div>
            <div class="col-md-10">
            <label>Télefono:</label>
            <p>
            <input 
            class="form-control" 
            type="text" 
            name="tel_mod" 
            id="tel_mod" 
            value="<?php echo $array['tel']?>"
            required>
            </div>
            <div class="col-md-10 col-sm">
            <label>Nombre de usauario:</label>
            <p>
            <input 
            class="form-control" 
            type="text" 
            name="usu_mod" 
            id="usu_mod" 
            value="<?php echo $_SESSION['user']?>">
            <p>
            <input 
              type="button" 
              class="btn btn-primary" 
              name="b_datos" 
              id="b_datos" 
              value="Modificar datos" 
              onclick="modUsu();">
            </div>
            <p>
           
          </form>
      </div>
      <div class="col-md-6 float-right">
        <h2 style="margin-bottom: 4%;">Cambiar Contraseña</h2>
        <div id="alerta">
        </div>
          <form action="php/modificar.php" method="POST" name="con">
            <div class="col-md-10">
            <p>
              <label>Nueva contraseña:</label>
              <input class="form-control" type="password" name="clave_mod" id="clave_mod">
            </div>
            <p>
            <div class="col-md-10">
              <p>
            <label>Confirmar contraseña:</label>
             <input class="form-control" type="password" name="confc_mod" id="confc_mod">
            <p>
              <input 
                type="button" 
                class="btn btn-primary"
                id="b_contra" 
                name="b_contra" 
                value="Cambiar contraseña" 
                onclick="modContra();">
            </div>
          </form>
      </div>

    </div style="padding-top: 150%;">

    </center>
      <div class="col-md-10 float-left" >
        <h2 style="margin-bottom: 4%;">Datos de envio</h2>
        <div id="alerta2">
        </div>
          <form action="php/modificar1.php" method="POST" name="datos">
            <div class="col-md-10">
            <p><label>Dirección:</label>
              <input 
              class="form-control" 
              type="text" 
              name="direccion" 
              id="direccion" 
              value="<?php echo $array['direccion']?>"
              onkeyup="capitalizarPrimeraLetra();">
            </div>
            <div class="col-md-10">
            <p><label>Localidad:</label>
              <input 
              class="form-control" 
              type="text" 
              name="localidad" 
              id="localidad" 
              value="<?php echo $array['localidad']?>"
              onkeyup="capitalizarPrimeraLetra();">
            </div>
            <div class="col-md-10">
            <label>Código Postal:</label>
            <p>
             <input 
             class="form-control" 
             type="text" 
             name="cp" 
             id="cp" 
             value="<?php echo $array['cp']?>"
             onkeyup="capitalizarPrimeraLetra();">
            </div>
            <div class="col-md-10">
            <label>Provincia:</label>
            <select name="provincia" id="provincia" class="select-css" tabindex="8">
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
            <p>
            <input 
              type="button" 
              class="btn btn-primary" 
              name="b_direcc" 
              id="b_direcc" 
              value="Modificar datos">
            </div>
            <p>
           
          </form>
      </div>
    

  </section>
  
 

