<?php
// Varios destinatarios
$para  =$email . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Gracias por registrarte';

//aleatoria
$codigo = rand(100000,999999);

// mensaje
$mensaje = '
<html>
<head>
    <meta charset="UTF8" />
  <title>Recordatorio</title>
</head>
<body>
  <p>tu codigo de verificacion es :!</p>
  <p> <a 
     href="http://localhost:8080/SistemaLogin/confirm.php?email='.$email.'">
    Verificar cuenta </a> 
    </p>
 <h2>'.$codigo.'</h2>
  
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras='';
$cabeceras .= 'From: Dianitza Qiu <dianitzaqiu17@gmail.com>' . "\r\n";
$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Asunto del email'. "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/

// Enviarlo
$enviado=false;
if(mail($para, $título, $mensaje, $cabeceras)){
   $enviado=true;
}




?>