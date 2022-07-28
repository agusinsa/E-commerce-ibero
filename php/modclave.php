<?php

require "conexion.php";

session_start();

$usuario=$_POST['usu'];
$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$dni=$_POST['dni'];
$telefono=$_POST['tel'];
$mail=$_POST['mail'];
$clave=$_POST['clave'];
$clave2=$_POST['confc'];
$tat=$_POST['act'];

//VERIFICAR SI USUARIO EXISTE
$sql2= "SELECT * from usuarios WHERE mail='$mail' or dni='$dni' or usuario='$usuario' ";

$consulta1 = mysqli_query($conexion,$sql2);
$insert= mysqli_num_rows($consulta1);

$array=mysqli_fetch_array($consulta1);

if($insert==0){
	//SI NO EXITE INSERTAR USUARIO A LA TABLA
	$sql1="INSERT INTO usuarios(usuario, nombre, apellido, dni, tel, mail, clave, act) VALUES ('".$usuario."', '".$nombre."', '".$apellido."', '".$dni."', '".$telefono."', '".$mail."', '".$clave."', '".$tat."')";
		$consulta = mysqli_query($conexion,$sql1);
		echo 1;
	}elseif ($dni==$array[2]) {
	echo 2;
	}elseif ($mail==$array[4]) {
	echo 3;
	}elseif ($usuario==$array[5]) {
		echo 4;
	}


	$_SESSION['user']=$usuario;


?>



