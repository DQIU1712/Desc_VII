<<<<<<< HEAD
<?PHP
   session_start();
?>
<HTML LANG="es">
    <HEAD>
        <TITLE>Laboratorio 12</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
    </HEAD>
    <BODY>
        <H1>Manejo de sesiones</H1>
        <H2>Paso 3: La variable ya ha sido destruida y su valor se ha perdido</H2>
        <?PHP
        if(isset($_SESSION['var'])){
            $var=$_SESSION['var'];
        }
        else{
            $var="";
        }
        print ("<P>Valor de la variable de sesion: $var</P>\n");
        session_destroy();
        ?>
        <A HREF='lab121.php'>Volver a paso 1</A>
    </BODY>
=======
<?PHP
   session_start();
?>
<HTML LANG="es">
    <HEAD>
        <TITLE>Laboratorio 12</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
    </HEAD>
    <BODY>
        <H1>Manejo de sesiones</H1>
        <H2>Paso 3: La variable ya ha sido destruida y su valor se ha perdido</H2>
        <?PHP
        if(isset($_SESSION['var'])){
            $var=$_SESSION['var'];
        }
        else{
            $var="";
        }
        print ("<P>Valor de la variable de sesion: $var</P>\n");
        session_destroy();
        ?>
        <A HREF='lab121.php'>Volver a paso 1</A>
    </BODY>
>>>>>>> 3f19928fb3c6832ae12203c1f46382004da2b8f5
</HTML>