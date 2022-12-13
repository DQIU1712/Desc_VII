<?php
//guardar los datos en la base de datos
require_once('modelo.php');
//conectar a la base de datos   
class Agenda extends modeloCredencialesBD{
    
    protected $categoria;
    protected $nombre;
    protected $descripcion;
    protected $raza;
    protected $fecha;
    protected $correo;
    protected $cell;
    protected $ubicacion;
    protected $fechac;
    protected $hora;

    public function __construct(){
        parent::__construct();
    }

    public function insertar_cita($categoria, $nombre, $descripcion, $raza, $fecha, $correo, $cell, $ubicacion, $fechac, $hora){
        
        $instruccion = "CALL insertar_cita('".$categoria."','".$nombre."', '".$descripcion."', '".$raza."', '".$fecha."', '".$correo."', '".$cell."', '".$ubicacion."', '".$fechac."', '".$hora."')";
        $consulta = $this->_db->query($instruccion); //ejecutar la consulta
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC); //obtener los datos de la consulta
        if(!$resultado){
            //echo "Fallo al insertar la cita";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }

    }

    //Funcion para mostrar las citas con la fecha actual
    public function mostrar_citas_hoy(){
        $instruccion = "CALL mostrar_citas_hoy2('".date('Y-m-d',strtotime('-1 day'))."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado){
            //echo "Fallo al mostrar las citas";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para mostrar las citas
    public function mostrar_citas(){
        $instruccion = "CALL mostrar_citas()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado){
            //echo " FALLO AL MOSTRAR LAS citaS";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para mostrar las citas con filtro
    public function mostrar_citas_filtro($campos, $valor){
        $instruccion = "CALL filtrar_citas('$campos', '$valor')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado){
            //echo "Fallo al mostrar las citas";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para VISUALIZAR las citas por id
    public function visualizar_cita($id){
        $this->id = $id;
        $instruccion = "CALL visualizar_cita('$this->id')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado){
            //echo "Fallo al visualizar la cita";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para ACTUALIZAR las citas por id
    public function actualizar_cita($categoria, $nombre, $descripcion, $raza, $fecha, $correo, $cell, $ubicacion, $fechac, $hora){
        
        $instruccion = "CALL actualizar_cita( '".$categoria."','".$nombre."', '".$descripcion."', '".$raza."', '".$fecha."', '".$correo."', '".$cell."', '".$ubicacion."', '".$fechac."', '".$hora."')";
        $consulta = $this->_db->query($instruccion);
        //$resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if($consulta==0){
            echo "Fallo al actualizar la cita <hr>";
        }else{
            echo "cita actualizada correctamente";
           // return $resultado;
            //$consulta->close();
            echo '<br><br><a href="./mostrar_todo.php">Volver </a>';
        }
        return $consulta;
    }

    //Funcion para ELIMINAR las citas por id
    public function eliminar_cita($id){
        $this->id = $id;
        $instruccion = "CALL eliminar_cita('$this->id')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado){
            echo "Fallo al eliminar la cita";
        }else{
            echo "cita eliminada correctamente";
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    
    
}
?>