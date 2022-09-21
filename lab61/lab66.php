<?php
final class ClaseBase {
    public function test(){
        echo "ClaseBase::test() llamada\n";
    }
    // Aquí da igual si se declara el método como
    // final o no
    final public function moreTesting(){
        echo "ClaseBase::moreTesting() llamada\n";
    }
}

class ClaseHijo extends ClaseBase {
    
}
//Aqui siendo que el error estan en no puede dejar blanco sin instruccion
?>