<?php

require "conexion.php";

session_start();

$usuario=$_POST['user_log'];
$clave=$_POST['clave_log'];
$ver_env=$_POST['ver_envio'];


$sql= "SELECT *, COUNT(*) as contar from usuarios 
	 WHERE (usuario='$usuario' or mail='$usuario')  and (clave='$clave')";

$consulta = mysqli_query($conexion,$sql);
$array= mysqli_fetch_array($consulta);



if($array['contar']>0){
	if($array['status']==1 && $ver_env==1){
			$_SESSION['user']=$array['usuario'];
			$_SESSION['id']=$array['id'];
			$_SESSION['clave']=$array['clave'];
			echo 4;//ENVIAR A PAGINA DE ENVIO
		}elseif($array['status']==1){
			$_SESSION['user']=$array['usuario'];
			$_SESSION['id']=$array['id'];
			$_SESSION['clave']=$array['clave'];
			echo 2;//USUARIO REGISTRADO Y ACTIVADO
		}elseif($array['status']==0){
			echo 1; // cuenta resgistrada pero no activada
		}else{
			echo 2;
		}
}else{
	echo 3;
}


?>