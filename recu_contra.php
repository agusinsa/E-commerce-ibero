<?php 
$mail=$_REQUEST['mail'];
?>
  <h1 class="text-center pt-3">Cambiar Contraseña</h1>
  <section class="p-5 wrapper">
      <center>
          <div class="col-8">
            <p><label for="">Nueva contraseña</label>       
            <input type="password" name="nueva_contra" id="nueva_contra" class="form-control"> 
            <br> 
            <label for="">Repetir contraseña</label>       
            <p><input type="password" name="rep_contra" id="rep_contra" class="form-control"> 
            <input type="hidden" value=<?php echo $mail;?> id="mail">  
            <p><button type="button" id="cambio_contra" class="btn btn-primary">Cambiar contraseña</button>   
            <br>
            <div id="alerta"></div>
          </div>
      </center>
  </section>
