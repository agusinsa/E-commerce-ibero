<?php 
require "conexion.php";
session_start();

$usu2=$_SESSION['user'];

//MODIFICAR DIRECCION

$direccion=$_POST['direccion'];
$localidad=$_POST['localidad'];
$cp=$_POST['cp'];
$provincia=$_POST['provincia'];

$sql3="UPDATE usuarios 
SET direccion='$direccion', localidad='$localidad', cp='$cp', provincia='$provincia' 
WHERE usuario='$usu2'";

$query3=mysqli_query($conexion,$sql3);

if($query3){
	echo 4;
}


 ?>