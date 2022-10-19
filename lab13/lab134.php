<HTML LANG="es">
    <HEAD>
        <TITLE>Laboratorio 13</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
    </HEAD>
    <BODY>
        <H1>Eliminar Cookies</H1>
        <?php
        if(isset($_COOKIE['user'])){
            setcookie('contador',"", time()+60*5);
            echo "<H3>La cookie 'user' ha sido eliminado satisfactoriamente</H3><BR/>";
        }else{
            echo "<H3>La cookie 'user' no existe</H><BR/>";
        }
        if(isset($_COOKIE['contador'])){
            setcookie('contador',"", time()+365*24*60*60);
            echo "<H3>La cookie 'contador' ha sido eliminado satisfactoriamente</H3><BR/>";
        }else{
            echo "<H3>La cookie 'contador' no existe</H><BR/>";
        }
       ?>
       <A HREF="lab131.php">Volver al contador de visitas</A>&nbsp;
       <A HREF="lab132.php">Volver al saludo a usuario</A>
    </BODY>
</HTML>