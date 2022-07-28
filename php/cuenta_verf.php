<?php 

require "conexion.php";
session_start();

$hash=$_REQUEST['hash'];
    //BOTON CORREO YA VERIFICADO
    $usu_ok="SELECT * FROM usuarios WHERE hash='$hash'";
    $res_usu_ok=mysqli_query($conexion, $usu_ok);
    $array_res=mysqli_fetch_array($res_usu_ok);

    if($array_res['status']==0){
        echo 4 ;//CORREO ACTIVADO
    }else{
        echo 3;//FALTA ACTIVAR EL CORREO
    }


?>