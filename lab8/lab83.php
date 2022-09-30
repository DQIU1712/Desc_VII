<Html>
<head>
    <title>Laboratorio 8.3</title>
</head>
<body>
    
<?PHP
if(array_key_exists('enviar', $_POST)){
   include('class_lib.php');
   $num=new Matriz($_REQUEST['num']);
   $num->mostrar_matriz();
}

else{
    ?>
    <FORM ACTION = "lab83.php" METHOD = "POST">
        Ingrese tamaño del matriz: <INPUT TYPE = "TEXT" NAME="num"><br>
        <INPUT TYPE = "SUBMIT" NAME="enviar" VALUE="Enviar datos">
</FORM>
<?PHP
}

?>
</body>
</html>

