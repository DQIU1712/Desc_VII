<?php
session_start();

include 'conexion.php';
$email = $_POST['email'];
$codigo = $_POST['codigo'];


$result=$conexion->query("select * from usuarios where email='$email' and codigo='$codigo' ")or die($conexion->error);

if (mysqli_num_rows($result) > 0) {
        
        $conexion->query("update usuarios set confirmado = 'si' where email='$email'")or die($conexion->error);

        $_SESSION['usuario_valido']=$email;
        header("Location: ../index2.php");
    } else {
        session_destroy();
        header("Location: ../index.php");
    }

?>