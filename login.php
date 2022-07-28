
<style>
  .boton_personalizado{
     border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
  }
  .boton_personalizado:hover{
   cursor: pointer;
  background: #ffc107;
  color: #000;
  }
  </style> 
  <?php 
      if(isset($_REQUEST['s'])){
         if($_REQUEST['s']==1){
            $env=$_REQUEST['s'];
         }
      } 
  ?>
 <section class="wrapper">
    <div class="login-box">
      <img src="imagenes/logo_prueba.jpg" class="avatar" alt="Avatar Image">
		<h1>Iniciar sesion</h1>
      	<div id="alerta"></div>
      		<form name="logi" id="logi" method="POST">
            <input type="hidden" id="ver_envio" value="<?= $env;?>">
        		<!-- USERNAME INPUT -->
      			<label for="username">Nombre de Usuario</label>
        		<input type="text" id="user_log" name="user_log" placeholder="Ingrese Nombre de Usuario o Mail" tabindex="1">
        		<!-- PASSWORD INPUT -->
        		<label for="password">Contraseña</label>
        		<input type="password" id="contra_log" name="contra_log" placeholder="Ingrese Contraseña" tabindex="2">
       			<input type="button" value="ingresar" id="logear" class="boton_personalizado" onclick="validarLog();" tabindex="3">
        		<a href="#"></a>
    		</form>
   			<p><a href="?m=recuperar">¿No puede ingresar?</a>
          <br>
        <a href="?m=registro">¿No tiene cuenta?</a>
   	</div>
</section>

<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>

