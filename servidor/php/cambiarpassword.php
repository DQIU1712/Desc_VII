<?php 
    include 'conexion.php';
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $p1=sha1($p1);
        $conexion->query("update usuarios set password='$p1' where email='$email' ")or die($conexion->error);
        echo "Contraseña cambiado";
        echo '<br><a href="../index.php">Volver </a>';
        
    }else{
        echo "no coinciden";
        echo '<br><a href="../cambiarpassword.php">Volver </a>';
    }
?>