 <?php 

 $result="";
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 if(isset($_POST['submit'])){

    // Load Composer's autoloader
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer;
    
    //Opciones del servidor
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com.ar';
    $mail->Port = 587;
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = tls;  
    $mail->Username = 'contacto@pintureriaiberoamericana.com'; 
    $mail->Password='Sikaflex221';

    $mail->setFrom('contacto@pintureriaiberoamericana.com');
    $mail->addAddress('contacto@pintureriaiberoamericana.com');
    $mail->addReplyTo($_POST['correo_cont'],$_POST['name_cont']);

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Consulta Pagina de '. $_POST['name_cont'];
    $mail->Body    = '<h3>Nombre: '.$_POST['name_cont'].'<br>
                      Email: '.$_POST['correo_cont'].'<br>
                      Telefono: '.$_POST['tel_cont'].'<br>
                      <br></h3>
                      <h2>Mensaje: '.$_POST['message'].'</h2>';

    
    if(!$mail->send()){
      $result='<div class="col-4 alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Error al enviar mensaje</div>';
    }else{
      $result='<div class="col-4 alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Mensaje enviado Correctamente</div>';
    }

 }

  ?>

 <center>
    <div class="container" style="margin-top:-6%;">
      
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <legend class="text-center" id="heade" style="padding-top: 10%;">Contactate con nosotros</legend>
                             <?php echo $result; ?>
                            <form>
                                <!--NOMBRE-->
                              <div class="form-group row mb-3">
                                <label for="name_cont" class="col-sm-2 col-form-label"><span><i class="fa fa-user-o bigicon"></i></span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="name_cont" id="name_cont" placeholder="Nombre y apellido" required>
                                </div>
                              </div>
                              <!--MAIL-->
                              <div class="form-group row">
                                <label for="correo_cont" class="col-sm-2 col-form-label"><span><i class="fa fa-envelope-o bigicon"></i></span></label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" name="correo_cont" id="correo_cont" placeholder="Correo electrónico" required>
                                </div>                                
                              </div>
                              <!--TELEFONO-->
                              <div class="form-group row">
                                <label for="tel_cont" class="col-sm-2 col-form-label"><span><i class="fa fa-phone-square bigicon"></i></span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tel_cont" id="tel_cont" placeholder="Teléfono" required>
                                </div>
                              </div>
                              <!--MENSAJE-->
                              <div class="form-group row">
                            <label for="message" class="col-sm-2 col-form-label"><i class="fa fa-pencil-square-o bigicon" aria-hidden="true"></i></label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Escribinos tu mensaje y te responderemos a la brevedad" rows="7" required></textarea>
                            </div>
                        </div>
                              <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                                  
                                </div>
                              </div>
                            </form>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</center>