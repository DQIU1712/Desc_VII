<?php
if(is_uploaded_file($_FILES['imagen']['tmp_name']))
{
    $nombreDirectorio="archivos/";
    $sizeArchivo=$_FILES['imagen']['size'];
    $nombrearchivo=$_FILES['imagen']['name'];
    $extension=$_FILES['imagen']['type'];
    $nombreCompleto=$nombreDirectorio.$nombrearchivo;

    
       
        if (is_file($extension)=="jpg" || is_file($extension) =="gif" || is_file($extension)=="png" || is_file($extension)=="jpeg"){
            if(is_file($sizeArchivo)<1048576){
            move_uploaded_file ($_FILES['imagen']['tmp_name'],
            $nombreDirectorio.$nombrearchivo);

            echo "El archivo se ha subido sastifactoriamente al directorio
            $nombreDirectorio <br>";
        }else echo "El imagen subido no puede ser mayor de 1 mb, debe reducirlo";
        
        } else echo "No es un formato válido.Solo puede subir imagen(jpg, jpeg, gif y png)";

}
else
    echo "No se ha podido subir el archivo <br>";
?>