<?php
session_start();
?>

<html lang="es">
<head>
    <title>Convertir Temperatura</title>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</head>

<body>
    <H1>Consulta de Servicio Web de Conversión de Temperatura</H1>
    <?PHP
    if (isset($_SESSION['usuario_valido'])) {
        ?>
        <?PHP 
         print '
        <form name="FormConv" method="post" action="convertirTemp.php">
            <br/>
            Convertir desde <SELECT NAME="temp">
                <OPTION value="CtoF" SELECTED>°C a °F
                <OPTION value="FtoC">°F a °C
            </SELECT> el valor
            <input type="number" name="valor" step="Any" required>
            <input value="Convertir" name="Convertir" type="submit" />
        </form> ';
        $servicio = "https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
        $parametros = array();
        if (array_key_exists('Convertir', $_POST)) {
            $valor = $_POST['valor'];
            $temp = $_POST['temp'];

            if ($temp == "CtoF") {
                $parametros['Celsius'] = $valor;
                $cliente = new SoapClient($servicio, $parametros);
                $resultObj = $cliente->CelsiusToFahrenheit($parametros);
                $resultado = $resultObj->CelsiusToFahrenheitResult;
            } else {
                $parametros['Fahrenheit'] = $valor;
                $cliente = new SoapClient($servicio, $parametros);
                $resultObj = $cliente->FahrenheitToCelsius($parametros);
                $resultado = $resultObj->FahrenheiRoCelsiusResult;
            }
            print("<BR>La temperatura $valor" . substr($temp, 0, 1) . " es igual a:
             $resultado" . substr($temp, 3, 1));
        }
        ?>
        <P>[ <A HREF="index.php">Desconectar</A>]</P>
    <?PHP
    } else {
        print("<br> <br>\n");
        print("<P ALIGN='CENTER'>Acceso no autorizado</p>\n");
        print("<P ALIGN='CENTER'>[<A HREF='index.php'>Conectar</A> ]</p>\n");
    }
    ?>
</body>

</html>