<Html>
<head>
    <title>Parcial</title>
</head>
<body>
<?PHP

$n=array();
$sum_n1=0;
$sum_n2=0;

for($n1=0; $n1<5 ;$n1++)
{
    for($n2=0; $n2<5; $n2++)
    {
         $n[$n1][$n2]=0;   
    }
}

for($n1=0; $n1<5; $n1++)
{
    for($n2=0; $n2<5; $n2++)
    {
        if($n2 == round(5/2) - 1)
            {
                $n[$n1][$n2] = rand(1, 100);
                $n[$n2][$n1] = rand(1, 100);

                $sum_n1 += $n[$n1][$n2];
                $sum_n2 += $n[$n2][$n1];
            }   
    }
}

for($n1=0; $n1<5; $n1++)
{
    for($n2=0; $n2<5; $n2++)
    {
        if($n[$n1][$n2] <0)
        {
                echo $n[$n1][$n2]."";
        }   else{
            
            echo $n[$n1][$n2]."&nbsp &nbsp &nbsp &nbsp &nbsp";
        }
        
    }echo "<br>";
}

echo "<br><br>La suma del valores de la columna del medio es: ".$sum_n1;
echo "<br><br>La suma del valores de la fila del medio es: ".$sum_n2;



?>
</body>
</html>

