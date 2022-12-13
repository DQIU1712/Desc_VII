<?php
class citas{
    private $conn;
    private $nombre_tabla = 'citas';
    public $categoria, $nombre, $descripcion, $raza, $fecha;
    public $correo, $cell, $ubicacion, $fechac, $hora;

    public function __construct($db){
        $this->conn = $db;
    }

    function insertar(){
        $query = "INSERT INTO " . $this->nombre_tabla . " SET categoria=:categoria, nombre=:nombre, descripcion=:descripcion, raza=:raza, fecha=:fecha, correo=:correo, cell=:cell, ubicacion=:ubicacion, fechac=:fechac, hora=:hora";
        $stmt = $this->conn->prepare($query);
        $this->categoria=htmlspecialchars(strip_tags($this->categoria));
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->raza=htmlspecialchars(strip_tags($this->raza));
        $this->fecha=htmlspecialchars(strip_tags($this->fecha));
        $this->correo=htmlspecialchars(strip_tags($this->correo));
        $this->cell=htmlspecialchars(strip_tags($this->cell));
        $this->ubicacion=htmlspecialchars(strip_tags($this->ubicacion));
        $this->fechac=htmlspecialchars(strip_tags($this->fechac));
        $this->hora=htmlspecialchars(strip_tags($this->hora));
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":raza", $this->raza);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":cell", $this->cell);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":fechac", $this->fechac);
        $stmt->bindParam(":hora", $this->hora);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function leer(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " ORDER BY fechac DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function leerUno(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->categoria = $row['categoria'];
        $this->nombre = $row['nombre'];
        $this->descripcion = $row['descripcion'];
        $this->raza = $row['raza'];
        $this->fecha = $row['fecha'];
        $this->correo = $row['correo'];
        $this->cell = $row['cell'];
        $this->ubicacion = $row['ubicacion'];
        $this->fechac = $row['fechac'];
        $this->hora = $row['hora'];
    }

    function actualizar(){
        $query = "UPDATE " . $this->nombre_tabla . " SET categoria=:categoria, nombre=:nombre, descripcion=:descripcion, raza=:raza, fecha=:fecha, correo=:correo, cell=:cell, ubicacion=:ubicacion, fechac=:fechac, hora=:hora WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->categoria=htmlspecialchars(strip_tags($this->categoria));
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->raza=htmlspecialchars(strip_tags($this->raza));
        $this->fecha=htmlspecialchars(strip_tags($this->fecha));
        $this->correo=htmlspecialchars(strip_tags($this->correo));
        $this->cell=htmlspecialchars(strip_tags($this->cell));
        $this->ubicacion=htmlspecialchars(strip_tags($this->ubicacion));
        $this->fechac=htmlspecialchars(strip_tags($this->fechac));
        $this->hora=htmlspecialchars(strip_tags($this->hora));
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":raza", $this->raza);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":cell", $this->cell);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":fechac", $this->fechac);
        $stmt->bindParam(":hora", $this->hora);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    function borrar(){
        $query = "DELETE FROM " . $this->nombre_tabla . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function buscar($keywords){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE titulo LIKE ? OR descripcion LIKE ? OR ubicacion LIKE ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare($query);
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        $stmt->execute();
        return $stmt;
    }

    function leerCategoria(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE categoria = ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerNombre(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE nombre = ? ORDER BY nombre DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->nombre);
        $stmt->execute();
        return $stmt;
    }

    function leerDescripcionCategoria(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE descripcion = ? AND categoria = ? ORDER BY descripcion DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->descripcion);
        $stmt->bindParam(2, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerCategoriaRaza(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE raza = ? AND categoria = ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->raza);
        $stmt->bindParam(2, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerFechaCategoria(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE fecha = ? AND categoria = ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->fecha);
        $stmt->bindParam(2, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerCorreoCategoria(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE correo = ? AND categoria = ? ORDER BY correo DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->correo);
        $stmt->bindParam(2, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerCell(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE cell = ? ORDER BY cell DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->cell);
        $stmt->execute();
        return $stmt;
    }

    function leerFechacCategoria(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE fechac = ? AND categoria = ? ORDER BY fechac DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->fechac);
        $stmt->bindParam(2, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerUbicacion(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE ubicacion = ? ORDER BY ubicacion DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->ubicacion);
        $stmt->execute();
        return $stmt;
    }
    function leerHora(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE hora = ? ORDER BY hora DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->hora);
        $stmt->execute();
        return $stmt;
    }

}


?>