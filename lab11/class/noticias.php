<?php

require_once('modelo.php');

class noticia extends modeloCredencialesBD{

    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct(){
        parent::__construct();
    }

    public function consultar_noticias(){

        $instruccion="CALL sp_listar_noticias()";

        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

       if(!$resultado){
          echo "fallo al consultar las noticias";
       }
       else{
        return $resultado;
        $resultado->close();
        $this->_db->close();
       }
    }
    
    public function consultar_noticias_filtro($campo, $valor){

        $instruccion="CALL sp_listar_noticias_filtro('".$campo."','".$valor."')";

        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

       if($resultado){
        return $resultado;
        $resultado->close();
        $this->_db->close();
       }
    }

    public function total_cantidad_noticias(){

        $instruccion="CALL sp_total_cantidad_noticias()";

        $resultado=$this->_db->prepare($instruccion);
        $resultado->execute();  
        $resultado->bind_result($cantidad);

       if($resultado->fetch()){
        return $cantidad;
        $resultado->close();
        $this->_db->close();
       }
       else{
        echo "fallo al consultar las cantidad de pagina del noticias";
       }
    }
    
    public function cambiar_pagina($min, $limit){

        $instruccion="CALL sp_cambiar_pagina(?, ?)";

        $resp=array();
        $resultado=$this->_db->prepare($instruccion);
        $resultado->bind_param('ii', $min, $limit);
        $resultado->execute();
        $resultado->bind_result($id,$titulo, $texto, $categoria, $fecha, $imagen);

        while ($resultado->fetch()) {
            $arr = array(
                "id"=>$id,
                "titulo"=>$titulo,
                "texto"=>$texto,
                "categoria"=>$categoria,
                "fecha"=>$fecha,
                "imagen"=>$imagen,
            );
            array_push($resp, $arr);
        }

        $resultado->close();
        return $resp;
    }
}

?>