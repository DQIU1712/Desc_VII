<HTML LANG="es">
<head>
    <title>Laboratorio 10.2</title>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</head>
<body>
    <H1>Encuesta. Resultado de la votacion</H1>

    <?PHP 
    require_once("class/noticias.php");
    
    $obj_noticia=new noticia();
    $noticias= $obj_noticia->consultar_noticias();

    foreach($result_votos as $result_voto){
        $votos1=$result_voto['votos1'];
        $votos2=$result_voto['votos2'];
    }
    $totalVotos=$votos1+$votos2;

    print ("<TABLE>\n");

    print ("<TR>\n");
    print ("<TH>Repuesta</TH>\n");
    print ("<TH>Votos</TH>\n");
    print ("<TH>Porcentaje</TH>\n");
    print ("<TH>Representacion grafica</TH>\n");
    print ("</TR>\n");

    $porcentaje = round (($votos1/$totalVotos)*100,2);
    print ("<TR>\n");
    print ("<TD CLASS='izquierda'>Si</TD>\n");
    print ("<TD CLASS='derecha'>$votos1</TD>\n");
    print ("<TD CLASS='derecha'>$</TD>\n");
    print ("<TH>Representacion grafica</TH>\n");
    print ("</TR>\n");

        foreach ($noticias as $resultado){
            print ("<TR>\n");
            print ("<TD>" . $resultado['titulo'] . "</TD>\n");
            print ("<TD>" . $resultado['texto'] . "</TD>\n");
            print ("<TD>" . $resultado['categoria'] . "</TD>\n");
            print ("<TD>" . date("j/n/Y",strtotime($resultado['fecha'])) . "</TD>\n");

            if ($resultado['imagen'] !=""){
                print ("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] . 
                "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
            }
            else{
                print ("<TD>&ndsp;</TD>\n");
            }
            print ("</TR>\n");
        }
        print ("</TABLE>\n");
    }
    else{
        print ("No hay noticias disponibles");
    }
    ?>
</body>
</HTML>

