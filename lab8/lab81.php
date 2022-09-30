<?php

if(array_key_exists('enviar', $_POST)){
    
    include('class_lib.php');
    $num=new Calcular($_REQUEST['num']);

    echo "<br/> El factorial del numero es: ".$num->calcular();
    
}
else{
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Laboratorio 8.1</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form name="formularioDatos" method="post" action="lab81.php">
            <p> CALCULAR NUMERO FACTORIAL DE NUMERO N</P>
            <br/>
            Introduzca el numero a calcular: <input type="text" name="num"
            value="">
            <br/><br/>
            <input value="Calcular" name="enviar" type="submit" />
        </form>
    </body>
</html>

<?php
}
?>
