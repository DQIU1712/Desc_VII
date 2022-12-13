<?php 
    include 'conexion.php';
    $email =$_POST['email'];
    $bytes = random_bytes(6);
    $token =bin2hex($bytes);

    include "mail_reset.php";
      
    $result=$conexion->query(" insert into passwords(email, token, codigo) values('$email','$token','$codigo') ")or die($conexion->error);

    if($result){
        echo '<p>Verifica tu email para restablecer tu cuenta</p>';
        echo'<p><a href="http://localhost/servidor/reset.php?email='.$email.'&token='.$token.'"> 
            para restablecer da click aqui </a><p> ';
         echo '<br><a href="../restablecer.php">Volver </a>';
    }
   

?>