<?php
    include 'conexion.php';
    if (isset($_REQUEST['email']) && isset($_REQUEST['pass'])) {
        $email = $_REQUEST['email'];
        $pass = sha1($_REQUEST['pass']);
        include "mail.php";

        $result=$conexion->query("select * from usuarios where email='$email' and password='$pass'")or die($conexion->error);
        

        if (mysqli_num_rows($result) > 0) {
            $codigo= Enviaremail($email); 
            $conexion->query("update usuarios set codigo = '$codigo' where email='$email'")or die($conexion->error);

            header("Location: ../confirmLogin.php?email=$email");
        } else {
            header("Location: ../index.php");
        }
    }else {
        echo 'contraseña invalido';
        header("Location: ../index.php");
    }
?>
