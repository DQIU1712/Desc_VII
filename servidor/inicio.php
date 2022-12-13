<?php
session_start();
?>
    <?PHP
    if (isset($_SESSION["usuario_valido"])) {
    ?>

        <HR>
        <UL>
            <LI><A HREF="index2.php">Mostrar cita</A></LI>
        </UL>
        <HR>

        <P>[ <A HREF="logout.php">Desconectar</A>]</P>
    <?php
    } //Intento de entrada fallido
    else if (isset($email)) {
        print("<br> <br>\n");
        print("<P ALIGN='CENTER'>Acceso no autorizado</p>\n");
        print("<P ALIGN='CENTER'>[<A HREF='index.php'>Conectar</A> ]</p>\n");
    } //Sesión no iniciada