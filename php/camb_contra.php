<?php 

require "conexion.php";

$n_contra=$_REQUEST['n_contra'];
$r_contra=$_REQUEST['r_contra'];
$mail=$_REQUEST['mail'];

if($n_contra!="" && $r_contra!=""){

    $query_camb="UPDATE usuarios SET clave='$n_contra' WHERE mail='$mail'";
    $res_camb=mysqli_query($conexion,$query_camb);

    if($query_camb){
        echo 1; //SE PUDO REESTABLECER CONTRASEÑA
    }else{
        echo 2; //ERROR AL REESTABLECER CONTRASEÑA
    }

}else{
    echo 3;
}

?>