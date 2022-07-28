
<?php 
require "php/conexion.php";

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/Exception.php';
  require 'phpmailer/PHPMailer.php';
  require 'phpmailer/SMTP.php';

$mail=$_REQUEST['mail'];


$queryReg="SELECT * FROM usuarios WHERE mail='$mail'";
$resReg=mysqli_query($conexion,$queryReg);

$checkHash=mysqli_fetch_array($resReg);

if(isset($_REQUEST['hash'])){
	$usuok="UPDATE usuarios SET status='1' WHERE mail='$mail'";
	$verok=mysqli_query($conexion,$usuok);
	$hash=$_REQUEST['hash'];
}


if($checkHash['hash']==$hash){
	$_SESSION['mail']=$checkHash['mail'];
	$_SESSION['user']=$checkHash['usuario'];
?>
<head>
<script src="js/regok.js"></script>
</head>
<section class="wrapper">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<div class="">
<h1><center>USUARIO REGISTRADO</center></h1>
</div>
<div>
<P><h3><center>Redireccionando a página principal</center></h3></P>
<?php
?>
</div>
<br>
	<br>
	<br>
	<br>
	<br>
	<br>

</section>
<?php 


}else{

	 $result=""; 
  

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
    $mail->addAddress($_REQUEST['mail']);
    $mail->addReplyTo('contacto@pintureriaiberoamericana.com');

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Activación de cuenta Pintureria Iberoamericana';
    $mail->Body    = '<p>Gracias por registrarte en Pinturería Iberoamericana.<br>
    					Ahora solo falta que actives tu cuenta para poder acceder a las funcionalidades de la página, solo tenes que hacer click en el siguiente enlace.<br>
    					<p>http://localhost/MODELO%202/?sesion=ok&m=regok&mail='.$_REQUEST['mail'].'&hash='.$checkHash['hash'].'
    					<br>
    					';


    
    if(!$mail->send()){
      $result='<div class="col-4 alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Error al enviar mensaje</div>';
    }else{
      $result='<div class="col-4 alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Mensaje enviado Correctamente</div>';
    }


?>
<head>
</head>

<section class="wrapper">
	<br>
	<br>
	<br>
	<br>
	<br>
<div class="">
<h1><center>Verificar Correo Electrónico</center></h1>
</div>
<div>
<P><h3><center>
	<div class="alert alert-warning">
			Para activar la cuenta, verifique en su casilla de correo electrónico <b><i>"<?php echo $_REQUEST['mail'];?>"</i></b> el mail de activación.
		<p>En caso de que el mensaje no aparezca en el buzón de entrada, verificar en la carpeta "SPAM"</div>
		<p>Verifique que su correo electrónico está bien escrito.
		<div id="alerta_ver"></div>
		<p><input class="text-center" id="veri_mail" type="text" name="veri_mail" value="<?php echo $_REQUEST['mail'];?>" style="width: 35%;"></center></h3></P>
		<input type="text" name="mail_viejo" id="mail_viejo" value=<?= $_REQUEST['mail'];?> hidden>
		<input type="text" name="check_hash" id="check_hash" value=<?= $checkHash['hash'];?> hidden>
			<center>
				<br>
				<p><button class="btn btn-primary text-center" id="verif_mail" style="width: 20%;">Reenviar correo</button>
				<p><button class="btn btn-success text-center" id="verf_ok" style="width: 20%;">Ya verificado</button></div>
				<br>
			</center> 

	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

</section>


<?php 
}

 ?>
