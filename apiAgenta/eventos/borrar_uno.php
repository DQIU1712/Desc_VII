<?php
//encabezados obligatorios 
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:access");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Credentials:true");
header('Content-Type:application/json');

//incluir archivos de conexion y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/eventos.php';

//obtener conexion a la base de datos
$conex=new Conexion();
$db=$conex->obtenerConexion();

//preparar el objeto cita
$eventos=new Eventos($db);

//obtener los datos
$data=json_decode(file_get_contents("php://input"));

//set ID property of record to delete
$eventos->id_ev=isset($_GET['id_ev']) ? $_GET['id_ev']: die();

//Borrar el cita
if($eventos->deleteOne()){
    
    //asignar codigo de respuesta-201 borrado 
    http_response_code(201);
    
    //informar al usuario 
    echo json_encode(array("message"=>"El cita ha sido borrado."));
}

//si no puede borrar el eventos, informar al usuario
else{
    //asignar codigo de respuesta-503 servicio no disponible
    http_response_code(503);
    //informar al usuario 
    echo json_encode(array("message"=>"No se puede borrar el cita."));
}
?>