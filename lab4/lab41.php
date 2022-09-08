<Html>
<head>
    <title>Laboratorio 4.1</title>
</head>
<?PHP
    if ($_REQUEST['Apellido'] !="")
    {
        echo "El apellido Ingresado es : $_REQUEST[Apellido]";
    }
    else
    {
        echo "Favor coloque el apellido";
    }
 ?>
</Body>
</Html>

