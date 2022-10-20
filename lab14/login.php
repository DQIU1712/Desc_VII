<?php
session_start();

if(isset($_REQUEST['usuario'])&& isset($_REQUEST['clave']))
{
    $usuario=$_REQUEST['usuario'];
    $clave=$_REQUEST['clave'];

    $salt=substr ($usuario,0,2);
    $clave_crypt=crypt($clave,$salt);

    require_once("class/usuarios.php");

    $obj_usuarios=new usuarios();
    $usuario_validado=$obj_usuarios->validar_usuario($usuario,$clave_crypt);

    foreach($usuario_validado as $array_resp){
        foreach($array_resp as $value){
            $nfilas=$value;
    }}

    if($nfilas>0)
    {
        $usuario_valido=$usuario;
        $_SESSION["usuario_valido"]=$usuario_valido;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<HTML LANG="es">
    <HEAD>
        <TITLE>Laboratorio 14-Login al sitio de Noticias</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
    </HEAD>
    <BODY>
        <?PHP
        if(isset($_SESSION["usuario_valido"]))
        {
        ?>
        <H1>Gestion de noticias</H1>    
        <HR>

        <UL>
            <LI><A HREF="lab142.php">Listar todas las noticias</A></LI>
            <LI><A HREF="lab143.php">Listar noticias por partes</A></LI>
            <LI><A HREF="lab144.php">Buscar noticias</A></LI>
        </UL>

        <HR>
        <P>[ <A HREF="logout.php">Desconectar</A>]</P>
        <?php
        }//Intento de entrada fallido
        else if (isset ($usuario))
        {
            print ("<br> <br>\n");
            print ("<P ALIGN='CENTER'>Acceso no autorizado</p>\n");
            print ("<P ALIGN='CENTER'>[<A HREF='login.php'>Conectar</A> ]</p>\n");
        }//Sesión no iniciada
        else
        {
            print ("<br> <br>\n");
            print ("<P CLASS='parrafocentrado'>Esta zona tiene el acceso restringido.<BR> ". 
            " Para entrar debe identificarse</p>\n");
            print ("<FORM CLASS='entrada' NAME='login' ACTION='login.php' METHOD='POST'>\n");
            print ("<P><LABEL CLASS='etiqueta-entrada'>Usuario:</LABEL>\n");
            print ("   <INPUT TYPE='TEXT' NAME='usuario' SIZE='15'></p>\n");
            print ("<P><LABEL CLASS='etiqueta-entrada'>Clave:</LABEL>\n");
            print ("   <INPUT TYPE='PASSWORD' NAME='clave' SIZE='15'></p>\n");
            print ("<P><INPUT TYPE='SUBMIT' VALUE='entrar'></p>\n");
            print("</FORM>\n");

            print ("<P CLASS='parrafocentrado'>NOTA: si no dispone de identificacion o tiene problemas " . 
            "para entrar<BR>pongas en contacto con el ". 
            "<A HREF='MAILTO:webmaster@localhost'>administrador</A> del sitio</p>\n");
        }
        
        ?>
    </BODY>
</HTML>