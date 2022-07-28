<?php 
require "conexion.php";
session_start();

//MODIFICAR USUARIO

$usu1=$_SESSION['user'];
$nom=$_POST['nom_mod'];
$ape=$_POST['ape_mod'];
$tel=$_POST['tel_mod'];
$usu=$_POST['usu_mod'];

$sql="UPDATE usuarios SET nombre='$nom', apellido='$ape', tel='$tel', usuario='$usu' WHERE usuario='$usu1'";

$query=mysqli_query($conexion,$sql);
if($query){
	$_SESSION['user']=$usu;
	echo 3;
}

 ?>