<Html>
<head>
    <title>Laboratorio 4.5</title>
</head>
<body>
    
<?PHP
if(array_key_exists('enviar', $_POST)){
$num=$_POST['num'];

$unit =0;

echo "<table border=1>";
for($n1=0; $n1<$num ;$n1++)
{
    for($n2=0; $n2<$num; $n2++)
    {
        if($unit==$n2){
            echo"<td>",1,"</td>";
        }
        else{
            echo "<td>",0,"</td>";
        }  
    }
    echo "</tr>";
    $unit = $unit +1;
    }
    echo "</table>";
}

else{
    ?>
    <FORM ACTION = "lab45.php" METHOD = "POST">
        Ingrese tamaño del matriz: <INPUT TYPE = "TEXT" NAME="num"><br>
        <INPUT TYPE = "SUBMIT" NAME="enviar" VALUE="Enviar datos">
</FORM>
<?PHP
}

?>
</body>
</html>

