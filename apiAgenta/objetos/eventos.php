<?php
class Eventos{

    //conexion de base de datos y tabla eventos 
    private $conn;
    private $nombre_tabla="eventos";

    //atributos de la clase
    public $id_ev,$titulo, $fecha_inicial,$fecha_final, $ubicacion, $detalle, $correo,$rep_dia,$categoria;


    //constructor con $db como conexion a base de datos
    public function __construct($db){
        $this->conn=$db;
    }

    function read(){
        //query para seleccionar todos
        $query= "SELECT
        id_ev, titulo, fecha_inicial, fecha_final, ubicacion, detalle, correo, rep_dia, categoria
        FROM ".$this->nombre_tabla ."";
        
        //sentencia para preparar query
        $stmt=$this->conn->prepare($query);

        //ejecutar query 
        $stmt->execute(); 
        
        return $stmt;
    }

    //crear producto 
    function crear(){

        //query para insertar un registro
        $query="INSERT INTO
           ".$this->nombre_tabla."
           SET 
           titulo=:titulo, fecha_inicial=:fecha_inicial, fecha_final=:fecha_final, ubicacion=:ubicacion, detalle=:detalle, correo=:correo, rep_dia=:rep_dia, categoria=:categoria";
           
           //preparar query
           $stmt=$this->conn->prepare($query);
           
           //sanitize
           $this->titulo=htmlspecialchars(strip_tags($this->titulo));
           $this->fecha_inicial=htmlspecialchars(strip_tags($this->fecha_inicial));
           $this->fecha_final=htmlspecialchars(strip_tags($this->fecha_final));
           $this->ubicacion=htmlspecialchars(strip_tags($this->ubicacion));
           $this->detalle=htmlspecialchars(strip_tags($this->detalle));
           $this->correo=htmlspecialchars(strip_tags($this->correo));
           $this->rep_dia=htmlspecialchars(strip_tags($this->rep_dia));
           $this->categoria=htmlspecialchars(strip_tags($this->categoria));
           
           //bindvalues
           $stmt->bindParam(":titulo",$this->titulo);
           $stmt->bindParam(":fecha_inicial",$this->fecha_inicial);
           $stmt->bindParam(":fecha_final",$this->fecha_final);
           $stmt->bindParam(":ubicacion",$this->ubicacion);
           $stmt->bindParam(":detalle",$this->detalle);
           $stmt->bindParam(":correo",$this->correo);
           $stmt->bindParam(":rep_dia",$this->rep_dia);
           $stmt->bindParam(":categoria",$this->categoria);
           
           //execute query
           if($stmt->execute()){
               return true;
            } 
            return false;
    }

    function readOne()
    {
        //consulta para leer un solo registro
        $query="SELECT 
        id_ev, titulo, fecha_inicial, fecha_final, ubicacion, detalle, correo, rep_dia, categoria
        FROM
           " . $this->nombre_tabla . "
           WHERE 
              id_ev=?
           LIMIT
              0,1";
        //preparar declaración de consulta
        $stmt=$this->conn->prepare($query);
        
        //ID de enlace del cita a actualizar
        $stmt->bindParam(1, $this->id_ev);
        
        //ejecutar consulta 
        $stmt->execute();
        
        //obtener fila recuperada
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
        //establecer valores a las propiedades del objeto
        $this->titulo=$row['titulo'];
        $this->fecha_inicial=$row['fecha_inicial'];
        $this->fecha_final=$row['fecha_final'];
        $this->ubicacion=$row['ubicacion'];
        $this->detalle=$row['detalle'];
        $this->correo=$row['correo'];
        $this->rep_dia=$row['rep_dia'];
        $this->categoria=$row['categoria'];
    }

    function deleteOne()
    {
        //consulta para leer un solo registro
        $query=" DELETE 
        id_ev, titulo, fecha_inicial, fecha_final, ubicacion, detalle, correo, rep_dia, categoria
        FROM
           " . $this->nombre_tabla . "
           WHERE 
           id_ev=?";
        //preparar declaración de consulta
        $stmt=$this->conn->prepare($query);
        
        //ID de enlace del cita a actualizar
        $stmt->bindParam(1,$this->id_ev);
        
        //ejecutar consulta 
        $stmt->execute();
        
        //obtener fila recuperada
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    function modificar(){
        //query para seleccionar todos
        $query= "UPDATE ".$this->nombre_tabla .
       " set  
        nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria_id=:categoria_id, creado=:creado";

     
           //preparar query
           $stmt=$this->conn->prepare($query);
           
           //sanitize
           $this->nombre=htmlspecialchars(strip_tags($this->nombre));
           $this->precio=htmlspecialchars(strip_tags($this->precio));
           $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
           $this->categoria_id=htmlspecialchars(strip_tags($this->categoria_id));
           $this->creado=htmlspecialchars(strip_tags($this->creado));
           
           //bindvalues
           $stmt->bindParam(":nombre",$this->nombre);
           $stmt->bindParam(":precio",$this->precio);
           $stmt->bindParam(":descripcion",$this->descripcion);
           $stmt->bindParam(":categoria_id",$this->categoria_id);
           $stmt->bindParam(":creado",$this->creado);
           
           //execute query
           if($stmt->execute()){
               return true;
            } 
            return false;
    }

}
?>
