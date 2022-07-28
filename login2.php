
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
  </head>
  <body>
  	<section>

    <div class="login-box">
      <img src="imagenes/logo_prueba.jpg" class="avatar" alt="Avatar Image">

      <h1>Iniciar sesion</h1>
      <div id="alerta"><div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Usuario o Contraseña Incorrectos</div></div>
      <form name="logi" method="POST">
        <!-- USERNAME INPUT -->
      
        <label for="username">Nombre de Usuario</label>
        <input type="text" id="user_log" name="user_log" placeholder="Ingrese Nombre de Usuario">
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input type="password" id="contra_log" name="contra_log" placeholder="Ingrese Contraseña">
       	<input type="submit" class="boton_personalizado" onclick="validarLog();" value="Ingresar">
        <a href="#"></a>
    </form>
    <a href="recuperar.php">¿No puede ingresar?</a>
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
<br><br><br>
<br><br><br>
</body>
