<?php

require "conexion.php";



$usuario=$_POST['usu'];
$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$dni=$_POST['dni'];
$telefono=$_POST['tel'];
$direccion=$_POST['direccion'];
$localidad=$_POST['localidad'];
$cp=$_POST['cp'];
$provincia=$_POST['provincia'];
$mail=$_POST['mail'];
$clave=$_POST['clave'];
$clave2=$_POST['confc'];
$tat=$_POST['act'];
$hash = md5( rand(0,1000) );

//VERIFICAR SI USUARIO EXISTE
$sql2= "SELECT * from usuarios WHERE mail='$mail' or dni='$dni' or usuario='$usuario' ";

$consulta1 = mysqli_query($conexion,$sql2);
$insert= mysqli_num_rows($consulta1);

$array=mysqli_fetch_array($consulta1);

if($insert==0){
	//SI NO EXITE INSERTAR USUARIO A LA TABLA
	$sql1="INSERT INTO usuarios(usuario, nombre, apellido, dni, tel, direccion, localidad, cp, provincia, mail, clave, act,hash) 
	VALUES ('".$usuario."', '".$nombre."', '".$apellido."', '".$dni."', '".$telefono."', '".$direccion."', '".$localidad."', '".$cp."', '".$provincia."', '".$mail."', '".$clave."', '".$tat."','".$hash."')";
		$consulta = mysqli_query($conexion,$sql1);
		echo 1;
		session_start();
	}elseif ($dni==$array['dni']) {
	echo 2;
	}elseif ($mail==$array['mail']) {
	echo 3;
	}elseif ($usuario==$array['usuario']) {
		echo 4;
	}else{
		echo 1;
	}


	$_SESSION['user']=$usuario;
	$_SESSION['mail']=$mail;


?>



