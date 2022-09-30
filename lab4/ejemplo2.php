<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.4</title>
</head>
<body>
    <?php
        define("TAM", 5);
        $evenNumber = true;
        $numeros = "";

        if(array_key_exists('enviar', $_POST)) {
            $num = $_POST['num'];
            $numeros = $_POST['numeros'];
            if(!empty($num)) {
                if($num % 2 == 0) {
                    $numeros .= $num.',';
                    $evenNumber = true;
                } else {
                    $evenNumber = false;
                }
            } else {
                echo "Por favor ingrese un numero.<br> <br>";
            }
        }
    ?>

    <form action="ejemplo2.php" method="post">
        ARREGLO DE NUMEROS PARES
        <br>

        <?php 
            if(!$evenNumber ) { ?>
                <p>El numero no es par  </p>
        <?php  } ?>

        <br>
        Ingrese un numero par
        <br>
        <input type="text" name="num">
        <input type="hidden" name="numeros" value="<?=$numeros ?>">
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <?php 
        $arr = explode(",", $numeros);
        if(sizeof($arr) == TAM) {
            echo "<br> Los numeros pares ingresados son: <br>";
            foreach($arr as $val) {
                echo "<br>$val";
            }
        }
    ?>

    

</body>
</html>