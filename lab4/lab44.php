<Html>
<head>
    <title>Laboratorio 4.4</title>
</head>
<body>
    
<?PHP      

$evenNumber = true;
$numeros = "";
if(array_key_exists('enviar', $_POST)){
    $num = $_POST['num'];
    $numeros = $_POST['numeros'];

    if(!empty($num)) {
        if($num % 2 == 0) {
            echo"El numero ingresado es $num";
            $evenNumero = true;
            
        } else {
            $evenNumero = false;
            echo "Ingrese un numero par";
        }
    }
}

else{
    ?>
    <FORM ACTION = "lab44.php" METHOD = "POST">
        <?php 
            if(!$evenNumber ) { ?>
                <p>El numero no es par  </p>
        <?php  } ?>

        <br>Ingrese un numero par <input type="text" name="num">;
        <input type="hidden" name="numeros" >;
        <br><br><INPUT TYPE = "SUBMIT" NAME="enviar" VALUE="Enviar">
    </FORM>
<?PHP
}

?>
</body>
</html>

