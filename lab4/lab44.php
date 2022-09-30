<Html>
<head>
    <title>Laboratorio 4.4</title>
</head>
<body>
    
<?PHP
if(array_key_exists('enviar', $_POST)){
    $numeros=array();
    $cant=$_POST['cant'];        
    $evenNumber = true;
    $numeros = "";
    $num = $_POST['num'];
    $numeros = $_POST['numeros'];

    for($i=1; $i<=$cant; $i++){
        while($n<$cant){
            $num=readline("Ingrese un numero par: ");
            array_push($numeros,$num);
            $i++;
        }
    }
}

else{
    ?>
    <FORM ACTION = "lab44.php" METHOD = "POST">
        Ingrese tamaño del arreglo: <INPUT TYPE = "TEXT" NAME="cant"><br>
        <br>Ingrese un numero par <input type="text" name="num">
        <input type="hidden" name="numeros" >
        <br><br><INPUT TYPE = "SUBMIT" NAME="enviar" VALUE="Enviar">
    </FORM>
<?PHP
}

?>

</body>
</html>

