<?php

require "conexion.php";

//PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

$mail_r=$_REQUEST['recu_contra'];//mail de recuperacion de contraseña

$rec_mail="SELECT *, COUNT(*) as contar FROM usuarios WHERE mail='$mail_r'";
$query_rec=mysqli_query($conexion,$rec_mail);
$array_rec=mysqli_fetch_array($query_rec);

if($array_rec['contar']>=1){
    if($array_rec['status']==1){
          // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer;
    
    //Opciones del servidor
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com.ar';
    $mail->Port = 587;
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   
    $mail->Username = 'contacto@pintureriaiberoamericana.com'; 
    $mail->Password='Sikaflex221';
    $mail->CharSet="UTF-8";

    $mail->setFrom('contacto@pintureriaiberoamericana.com', 'Pintureria Iberoamericana');
    $mail->addAddress($mail_r);
    $mail->addReplyTo('contacto@pintureriaiberoamericana.com');

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reestablecer contraseña Pintureria Iberoamericana';
    $mail->Body    = '<p>Para reestablecer la contraseña de su cuenta, haga click en el siguiente enlace.<br>
    					<p>http://localhost/MODELO%202/?&m=camb_contra&mail='.$mail_r.'
                        <br>
                        <p>Si usted no solicitó el cambio de contraseña, ignore este mensaje.</p>
    					';


    
    if(!$mail->send()){
      $result='<div class="col-4 alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Error al enviar mensaje</div>';
    }else{
      $result='<div class="col-4 alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Mensaje enviado Correctamente</div>';
    }
        echo 1;//se envio mail de recuperacion
        
    }else{
        echo 2;// cuenta registrada pero no activada
    }
}else{
    echo 3;// mail no registrado
}



?>