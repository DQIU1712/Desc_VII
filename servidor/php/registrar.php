<?php
include 'conexion.php';
if (
    isset($_REQUEST['nombre']) && isset($_REQUEST['email']) && isset($_REQUEST['pass'])
    && isset($_REQUEST['pass2'])
) {

    if ($_REQUEST['pass'] == $_REQUEST['pass2']) {
        $name = $_REQUEST['nombre'];
        $email = $_REQUEST['email'];
        $pass = sha1($_REQUEST['pass']);
        include "mail.php";     
        $codigo= Enviaremail($email); 
           
        $result=$conexion->query("insert into usuarios (nombre, email,password, confirmado ,codigo) values('$name','$email','$pass','no','$codigo') ")or die($conexion->error);

        if ($result) {     
            
            echo "Favor de revisar tu email para verificar tu cuenta";
            echo '<br><br><a href="http://localhost/servidor/confirm.php?email='.$email.'">Verificar cuenta </a> ';
            echo '<br><br><a href="../register.php">Volver </a>';
        } else {
            echo "no se pudo enviar el email";
            echo '<br><a href="../register.php">Volver </a>';
        }
    } else {
        echo "password invalidos";
        echo '<br><a href="../register.php">Volver </a>';
    }
}
?>