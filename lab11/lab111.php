<HTML LANG="es">
<head>
    <title>Laboratorio 11.1</title>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</head>
<body>
    <H1>Consulta de noticias</H1>
    <?PHP 
    require_once("class/noticias.php");  
    $obj_noticia=new noticia();

    if (array_key_exists('enviar', $_POST)) {
        $min = $_REQUEST['min'];
        $limit = $_REQUEST['limit'];
    } else {
        $min = 0;
        $limit = 5;
    }

    if ($_REQUEST['enviar'] == "1") {
        $min = $min + 5;
        $limit = $limit +5;
    } else if ($_REQUEST['enviar'] == "0") {
        $min = $min - 5;
        $limit = $limit -  5;
    }
    

    $noticias= $obj_noticia->cambiar_pagina($min, $limit);
    $total=$obj_noticia->total_cantidad_noticias();
    
    if ($min <= 0) {
        $btn1 = "<button type='submit' name='enviar' disabled='true' value='0'>Anterior</button> ";
        $btn2 = "<button type='submit' name='enviar' value='1'>Siguiente</button>";
    } else if ($limit >= $total) {
        $btn1 = "<button type='submit' name='enviar' value='0'>Anterior</button> ";
        $btn2 = "<button type='submit' name='enviar' disabled='true' value='1'>Siguiente</button>";
    } else {
        $btn1 = "<button type='submit' name='enviar' value='0'>Anterior</button> ";
        $btn2 = "<button type='submit' name='enviar' value='1'>Siguiente</button>";
    }

    $nfilas=count($noticias);

    if($nfilas>0){
        
        print ("<form action='lab111.php' method='post'>
            <input type='hidden' name='min' value='$min'>
            <input type='hidden' name='limit' value='$limit'>
            <TR>Mostrando noticias ". $min+1 ." a $limit de un total de $total .[$btn1|$btn2] </TR>
            </form>");
        
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<TH>Titulo</TH>\n");
        print ("<TH>Texto</TH>\n");
        print ("<TH>Categoria</TH>\n");
        print ("<TH>Fecha</TH>\n");
        print ("<TH>Imagen</TH>\n");
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