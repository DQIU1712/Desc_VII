<?php
if(is_uploaded_file($_FILES['imagen']['tmp_name']))
{
    $nombreDirectorio="archivos/";
    $sizeArchivo=$_FILES['imagen']['size'];
    $nombrearchivo=$_FILES['imagen']['name'];
    $nombreCompleto=$nombreDirectorio.$nombrearchivo;

    
       if(is_file($sizeArchivo)<=1048576 &&($_FILES['imagen']['type']=="image/jpeg"||$_FILES['imagen']['type']=="image/jpg"||$_FILES['imagen']['type']=="image/png"||$_FILES['imagen']['type']=="image/gif")){
            
                move_uploaded_file ($_FILES['imagen']['tmp_name'],
                $nombreDirectorio.$nombrearchivo);

                echo "El archivo se ha subido sastifactoriamente al directorio
                $nombreDirectorio <br>";
                
        } else 
        echo "No es un formato válido.Solo puede subir imagen(jpg, jpeg, gif y png) y el tamaño del imagen no mayor a 1mb";
}
else
    echo "No se ha podido subir el archivo <br>";
?>