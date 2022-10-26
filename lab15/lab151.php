<HTML LANG="es">
<head>
    <title>Laboratorio 15.1</title>
    <LINK REL="stylesheet" TYPE="text/css" HREF="jquery.dataTables.min.css">    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
    <script type="text/javascript" languaje="javascript" src="jquery-3.1.1.js"></script>
    <script type="text/javascript" languaje="javascript" src="jquery.dataTables.min.js"></script>
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#grid').DataTable({
               "lengthMenu":[5,10,20,50],
               "order":[[0,"asc"]],
               "language":{
                   "lengthMenu": "Mostrar _MENU_ registros por pagina",
                   "zeroRecords": "No existen resultados en su busqueda",
                   "info": "Mostrando pagina _PAGE_ de _PAGES_",
                   "infoEmpty": "No hay registros disponibles",
                   "infoFiltered": "Buscado entra _MAX_ registros en total)",
                   "search": "Buscar: ",
                   "paginate": {
                       "first": "Primero",
                       "last": "Ultimo",
                       "next": "Siguiente",
                       "previous": "Anterior"
                },
            }

        })
    });
    </script>

    <H1>Consulta de noticias</H1>
    <?PHP 
    require_once("class/noticias.php");
    
    $obj_noticia=new noticia();
    $noticias= $obj_noticia->consultar_noticias();

    $nfilas=count($noticias);

    if($nfilas>0){
        print ("<TABLE id='grid' class='display' cellspacing='0'>\n");
        print ("<THEAD>\n");
        print ("<TR>\n");
        print ("<TH>Titulo</TH>\n");
        print ("<TH>Texto</TH>\n");
        print ("<TH>Categoria</TH>\n");
        print ("<TH>Fecha</TH>\n");
        print ("<TH>Imagen</TH>\n");
        print ("</TR>\n");
        print ("</THEAD>");
        print ("<TBODY>\n");

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
            print ("</TBODY>\n");
        }
        print ("</TABLE>\n");
    }
    else{
        print ("No hay noticias disponibles");
    }
    ?>
</body>
</HTML>

