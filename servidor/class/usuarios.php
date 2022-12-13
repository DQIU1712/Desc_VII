<?PHP
require_once('modelo.php');

class usuarios extends modeloCredencialesBD{
    public function __construct(){
        parent::__construct();
    }

    public function validar_usuario($email,$pass){

        $instruccion="CALL sp_validar_usuario('".$email."','".$pass."')";
        
        //$consulta=$this->_db->query("select * from usuarios where email='$email' and password='$pwd'");
        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

        if($resultado){

            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

}
?>