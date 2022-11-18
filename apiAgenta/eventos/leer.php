<?php
//encabezados obligatorios 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//incluir archivos de conexion y objetos 
include_once '../configuracion/conexion.php';
include_once '../objetos/eventos.php';

//inicializar base de datos y objeto eventos
$conex=new Conexion();
$db=$conex->obtenerConexion();

//inicializar objeto
$eventos=new Eventos($db);

//query eventos
$stmt=$eventos->read();
$num=$stmt->rowCount();

//verificar si hay mas de 0 registros encontrados 
if($num>0){
    
    //arreglo de eventos
    $eventos_arr=array();
    $eventos_arr["records"]=array();
    
    //obtiene todo el contenido de la tabla
    //fetch() es mas rapido que fetchAll()
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        //extraer fila
        extract($row);
        
        $eventos_item=array(
            "id_ev" => $id_ev,
            "titulo"=> $titulo,
            "fecha_inicial"=>$fecha_inicial,
            "fecha_final"=>$fecha_final,
            "ubicacion"=>$ubicacion,
            "detalle"=>$detalle,
            "correo"=>$correo,
            "rep_dia"=>$rep_dia,
            "categoria"=>$categoria,
        );
        
        array_push($eventos_arr["records"], $eventos_item);
    }
    
    //asignar codigo de respuesta - 200 OK 
    http_response_code(200);

    //mostrar eventos en formato json 
    echo json_encode($eventos_arr);

}else{
    //asignar codigo de respuesta - 404 No encontrado 
    http_response_code(404);
    
    //informarle al usuario que no se encontraron eventos
    echo json_encode(
        array("message" => "No se encontraron eventos.")
    );
}
?>