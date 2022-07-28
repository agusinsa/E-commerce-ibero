<?php 

    require "conexion.php";

    $mail_nuevo=$_REQUEST['mail'];
    $mail_ant=$_REQUEST['mail_ant'];

    //verificar si el mail ya esta registrado y activado

    if($mail_nuevo==$mail_ant){
        echo 1;//correo reenviado
        
    }else{
        $mail_rep="SELECT *, COUNT(*) as contar FROM usuarios WHERE mail='$mail_nuevo'";
        $query_mail=mysqli_query($conexion,$mail_rep);
        $array_mail=mysqli_fetch_array($query_mail);
        
        if($array_mail['contar']>=1){
            echo 2;// mail registrado
        }else{
            $mod_mail="UPDATE usuarios SET mail='$mail_nuevo' WHERE mail='$mail_ant'";
            $query_mod=mysqli_query($conexion, $mod_mail);
            echo 1;// correo actualizado y actualizado
        }      
      
    }


?>