<?php 

require "conexion.php";
session_start();
/*MODIFICAR CONTRASEÑA*/
$clave1=$_POST['contra_mod'];
$clave2=$_POST['confc_mod'];
$usu=$_SESSION['user'];


//trae la contraseña de la base para ver si es la misma que la ingresada para cambiar
$sql1="SELECT clave FROM usuarios WHERE usuario='$usu'";
$query1=mysqli_query($conexion,$sql1);
$array=mysqli_fetch_array($query1);


	//SI LA CONTRASEÑA NO ES LA MISMA, LA MODIFICA
	$sql2="UPDATE usuarios SET clave='$clave1' WHERE usuario='$usu'";
	$query2=mysqli_query($conexion,$sql2);
	

	if($array[0]==$clave1){//compara la contraseña de la base con la ingresada
		echo 2;//si son iguales devuelve 2
	}elseif ($query2){
		echo 1;//si son distinas devuleve 1 y se registra en la base
	}


 ?>