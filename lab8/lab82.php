<?php

if(array_key_exists('enviar', $_POST)){
    
    include('class_lib.php');
    $servicio=new Calificar($_REQUEST['servicio']);
    echo "<br/><br/> <br><br/>".$servicio->calificar();
    
}
else{
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Laboratorio 8.2</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form name="formularioDatos" method="post" action="lab82.php">
            <p> CALIFICAR EL SERVICIO</P>
            <br/>
            El venta de servicio es: <input type="text" name="servicio" value="">
            <br/><br/>
            <input value="Enviar" name="enviar" type="submit" />
        </form>
    </body>
</html>

<?php
}
?>
