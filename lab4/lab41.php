<?php 
        $servicio = $_REQUEST['servicio']; 
        if ($servicio>=80){
            echo"<img src=buena.jpg>";
            echo'<br>El servicio es :Bueno, '.$servicio;
        }
    
        else if($servicio<80 && $servicio>50){
            echo"<img src=intermedio.jpg>";
            echo'<br>El servicio es :Intermedio, '.$servicio;
        } 
        
        if($servicio<50){
            echo"<img src=mala.jpg>";
            echo'<br>El servicio es :malo '.$servicio;
       }
 ?>


