<?php

class Calcular{
    function __construct($num1){
        $this->num=$num1;
    }

    public function calcular(){ 
        $fac=1;
        for ($i = 1; $i<= $this->num; $i++){ 
            $fac= $fac * $i;
        }      
     return $fac;
    }
}

class Calificar{
    function __construct($servi1){
        $this->servicio=$servi1;
    }

    public function calificar(){ 
        if ($this->servicio>=80){
            echo"<img src=buena.jpg>";
            echo'<br>El servicio es :Bueno, '.$this->servicio;
        }
    
        else if($this->servicio<80 && $this->servicio>50){
            echo"<img src=intermedio.jpg>";
            echo'<br>El servicio es :Intermedio, '.$this->servicio;
        } 
        
        if($this->servicio<50){
            echo"<img src=mala.jpg>";
            echo'<br>El servicio es :malo '.$$this->servicio;
       }
    } 
}

class Matriz{
    function __construct($num1){
        $this->num=$num1;
    }

    public function mostrar_matriz(){ 
        $unit =0;
        echo "<table border=1>";
        for($n1=0; $n1<$this->num ;$n1++)
        {
            for($n2=0; $n2<$this->num; $n2++)
            {
                if($unit==$n2){
                    echo"<td>",1,"</td>";
                }
                else{
                    echo "<td>",0,"</td>";
                }  
            }
            echo "</tr>";
            $unit = $unit +1;
            }
            echo "</table>";
    }
}

?>
















