<Html>
<head>
    <title>Laboratorio 4.2</title>
</head>
<body>
<?PHP
   $num=$_POST['num'];
   function factorial($n){
    if($n==1)
    return 1;
    else 
    return $n*factorial($n-1);
   }
   
   echo'El factorial del numero es: '.factorial($num);
?>
</body>
</html>