<?php
//encabezados obligatorios
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");

//obtener conexion de base de datos
include_once '../configuracion/conexion.php';

//instanciar el objeto eventos
include_once '../objetos/eventos.php';

$conex = new Conexion();
$db = $conex->obtenerConexion();
$eventos = new Eventos($db);

//obtener los datos
$data=json_decode(file_get_contents("php://input"));
//asegurar que los datos no esten vacios
if(
    !empty($data->titulo) &&
    !empty($data->ubicacion)&&
    !empty($data->detalle) &&
    !empty($data->correo) &&
    !empty($data->rep_dia) &&
    !empty($data->categoria)
){ 
//asignar valores de propiedad a eventos
$eventos->titulo=$data->titulo;
$eventos->fecha_inicial=$data->fecha_inicial;
$eventos->fecha_final=$data->fecha_final;
$eventos->ubicacion=$data->ubicacion;
$eventos->detalle=$data->detalle;
$eventos->correo=$data->correo;
$eventos->rep_dia=$data->rep_dia;
$eventos->categoria=$data->categoria;


//crear el eventos
if($eventos->crear()){
    
    //asignar codigo de respuesta-201 creado 
    http_response_code(201);
    
    //informar al usuario 
    echo json_encode(array("message"=>"El cita ha sido creado."));
}

//si no puede crear el eventos, informar al usuario
else{
    //asignar codigo de respuesta-503 servicio no disponible
    http_response_code(503);
    //informar al usuario 
    echo json_encode(array("message"=>"No se puede crear el cita."));
}
}
//informar al usuario que los datos estan incompletos 
else{ 

    //asignar codigo de respuesta-400 solicitud incorrecta 
    http_response_code(400);
    
    //informar al usuario 
    echo json_encode(array("message"=>"No se puede crear el cita. Los datos están incompletos."));
}
?>