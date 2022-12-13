<?php

session_start();

include 'conexion.php';
$email = $_POST['email'];
$codigo = $_POST['codigo'];


$result=$conexion->query("select * from usuarios where email='$email' and codigo='$codigo' ")or die($conexion->error);


if (mysqli_num_rows($result) > 0) {
    $conexion->query("update usuarios set confirmado = 'si' where email='$email' and confirmado='no'")or die($conexion->error);
    echo 'USUARIO VALIDO. <br><br> BIENVENIDO.<br><br>  Ya puedes <a href="../index.php">Iniciar sesion </a>';
} else {
    echo "CODIGO INVALIDO";
    echo '<br><a href="../index.php">Volver </a>';
}
?>
