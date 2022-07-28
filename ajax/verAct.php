<?php 
    require "../php/conexion.php";
    $user=$_POST['user'];
    $contra=$_POST['contra'];

    $verifica_user="SELECT * FROM usuarios WHERE usuario='$user'";
    $consulta=mysqli_query($conexion,$verifica_user);
    $array_ver=mysqli_fetch_array($consulta);

    if($array_ver['status']==0){
        echo 1; // si el estado es 0 , la cuenta no esta activada
    }else{
        echo 2;// si el estado es 1, la cuenta esta activada
    }






 ?>