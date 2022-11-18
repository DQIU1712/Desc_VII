<HTML LANG="es">
<head>
    <title>Agregar cita</title>
</head>
<body>
    <H1>Agregar evento</H1>
    <?PHP 
    require_once("class/agenda.php");  

    if (array_key_exists('enviar',$_POST)) {
        $obj_agenda = new agenda();
        $obj_agenda->crear_evento($_REQUEST['titulo'], $_REQUEST['fecha_inicial'], $_REQUEST['fecha_final'], $_REQUEST['ubicacion'], $_REQUEST['detalle'], $_REQUEST['correo'],$_REQUEST['rep_dia'],$_REQUEST['categoria']);
        
    }

    else{
        ?>
        
        <!DOCTYPE html>
        <html>
            <head>
                <title>Laboratorio 18</title>
                <meta charset="utf-8">
            </head>
            <body>
                <form action='index.php' method='post'>
                    Titulo: <input type='text' name='titulo' value=''><br/><br/> 
                    Fecha inicial: <input type='date' name='fecha_inicial' value='yyyy-mm-dd'><br/><br/>  
                    Fecha final: <input type='date' name='fecha_final' value=''><br/><br/> 
                    Ubicacion: <input type='text' name='ubicacion' value=''><br/><br/> 
                    Detalle: <input type='text' name='detalle' value=''><br/><br/> 
                    Correo: <input type='email' name='correo' placeholder='hola@dominio.com' value=''><br/><br/> 
                    Repetir dia: <input type='text' name='rep_dia' value=''><br/><br/> 
                    Categoria: <input type='text' name='categoria' value=''><br/><br/> 
            <input value="Agregar agenda" name="enviar" type="submit" />

            </form>
            <A HREF="index.php">Regresar Agenta</A>&nbsp;
            </body>
        </html>
        
        <?php
        }
        ?>