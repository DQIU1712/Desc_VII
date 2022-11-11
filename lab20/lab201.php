<html>
    <head>
        <title>Laboratorio 20</title>
    </head>
    <body>
        <form action="lab201.php" method="post">
            Nombre: <input type="text" Name="nombre" required><BR>
            Apellido: <input type="text" Name="apellido" required><br>
            Email: <input type="email" Name="email"><br>
            Edad:  <input type="number" Name="edad" min="0" max="120"><br><br>
            <input type="submit" name="guardar" value="Guardar datos">
        </form>
        <?php
        include("UsuariosMDB.php");
        $usrs=new UsuariosMDB();

        if(array_key_exists('guardad', $_POST)){
            $usrs->insertarRegistro($_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['email'],$_REQUEST['edad']);
            echo "Registro insertado existosamente <br><br>";
        }

        echo "Registro en la coleccion usuarios: <br>";
        $usrs->obtenerRegistros();
        ?>
    </body>
</html>