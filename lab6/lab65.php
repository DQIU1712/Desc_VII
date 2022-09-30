<?php

class ClaseBase{
    public function test(){
        echo "ClaseBase:: test() llamada\n";
    }
    final public function masTests(){
        echo "ClaseBase::masTests() llamada\n";
    }
}

class ClaseHijo extends ClaseBase{
    public function masTests2(){
        echo "ClaseHijo::masTests() llamada\n";
    }
}
//Nose puede porque estan redefiniendo el metodo. entonce no puede anular.
//En clase principal ya habia llamado y en clsehijo quiere otravez y no van a permitir.
//Cambie el nombre del function del claseHijo
?>