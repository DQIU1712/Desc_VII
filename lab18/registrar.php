<?php

  // Incluir el archivo funciones.php
  include 'class_lib.php';
  // se verifica que se haya enviado el formulario
  if (isset($_POST['nombre'])) {
    // se verifica que el nombre de usuario no esté vacío
    if ($_POST['nombre'] == "") {
      echo "Debe ingresar un nombre de usuario";
    }
    // se verifica que el apellido no esté vacío
    elseif ($_POST['apellido'] == "") {
      echo "Debe ingresar un apellido";
    }
    // se verifica que el correo no esté vacío
    elseif ($_POST['email'] == "") {
      echo "Debe ingresar un email";
    }
    // se verifica que el correo sea válido
    elseif (!verificar_email($_POST['email'])) {
      echo "Debe ingresar un email válido";
    }
    // se verifica que el contraseña no esté vacío
    elseif ($_POST['password'] == "") {
      echo "Debe ingresar un contraseña";
    }
    // se verifica que el contraseña sea válido
    elseif (!verificar_password_strenght($_POST['password'])) {
      echo "Debe ingresar una contraseña válido";
    }
    // se verifica que el contraseña sea igual al password2
    elseif ($_POST['password'] != $_POST['repetirPassword']) {
      echo "Las contraseñas no coinciden";
    }
    // se verifica que la IP no esté vacía
    elseif ($_POST['ip'] == "") {
      echo "Debe ingresar una IP";
    }
    // se verifica que la IP sea válida
    elseif (!verificar_ip($_POST['ip'])) {
      echo "Debe ingresar una IP válida";
    }
    // si todo está bien, se muestra un mensaje de éxito
    else {
     echo "<script>alert('Usuario registrado con éxito');</script>";
    }
  }
else{
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Laboratorio 18</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form name="formularioDatos" method="post" action="registrar.php">
            <p> Registro de usuario en php</P>
            <br/>
            Nombre: <input type='text' name='nombre'  required><br/><br/> 
            Apellido: <input type='text' name='apellido' required><br/><br/>
            Email: <input type='email' name='email' placeholder='hola@dominio.com' required><br/><br/>
            Contraseña: <input type='password' name='password' required><br/><br/>
            Repetir contraseña: <input type='password' name='repetirPassword' required><br/><br/>
            Ip: <input type='text' name='ip' required><br/><br/>

            <input value="Registrar Usuario" name="enviar" type="submit" />
        </form>
    </body>
</html>

<?php
}
?>