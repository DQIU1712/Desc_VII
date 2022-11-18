<?php
//encabezados obligatorios 
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:access");
header("Access-Control-Allow-Methods:GET");
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

//set ID property of record to read
$eventos->id_ev=isset($_GET['id_ev']);

//leer los detalles del eventos a editar
$eventos->readOne();

if($eventos->titulo!=null){
    //creacion del arreglo
    $eventos_arr=array(
        "id_ev" =>$eventos->$id_ev,
        "titulo"=>$eventos->$titulo,
        "fecha_inicial"=>$eventos->$fecha_inicial,
        "fecha_final"=>$eventos->$fecha_final,
        "ubicacion"=>$eventos->$ubicacion,
        "detalle"=>$eventos->$detalle,
        "correo"=>$eventos->$correo,
        "rep_dia"=>$eventos->$rep_dia,
        "categoria"=>$eventos->$categoria);

        //asignar codigo de respuesta - 200 OK http_response_code(200);
        //mostrarlo en formato json
        echo json_encode($eventos_arr);
}
?>