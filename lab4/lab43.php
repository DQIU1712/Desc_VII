<Html>
<head>
    <title>Laboratorio 4.2</title>
</head>
<body>
<?PHP
$arreglo=['cant'];
$cant=$_POST['cant'];
$mayor=0;
for($i=1; $i<=$cant; $i++){
    $arreglo[$i]=rand(1,999);
    echo "<br>Numero $i es $arreglo[$i]" ;

        if($mayor<$arreglo[$i]){
            $mayor=$arreglo[$i];
        }
}
echo "<p>";

for($i=1; $i<=$cant; $i++){
    echo "<br>$arreglo[$i]" ;
}
echo "<br><br>Numero mayor es $mayor" ;

?>
</body>
</html>

