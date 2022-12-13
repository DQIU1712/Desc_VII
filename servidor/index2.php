<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cita Veterinaria</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <!-- Cabecera -->
    <header>
        <div class="contenedor">
            <h1>Registrar cita</h1>
        </div>
    </header>
    
    

    <!-- Menu con opciones Agregar, Mostrar y Buscar -->
    <div class="contenedor">
        <nav class="menu">
            <ul>
                <li><a href="index2.php">Agregar Citas</a></li>
                <li><a href="citas.php">Mostrar Citas</a></li>
                <li><a href="mostrar_todo.php">Buscar Citas</a></li>
            </ul>
        </nav>
    </div><br>
    <!-- Contenedor -->

    <div class="contenedor">
        <form action="index2.php" method="post">
        <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria ">
                    <option value="Enfermo">Enfermo</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Belleza">Belleza</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre del macosta" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input name="text" name="descripcion" id="descripcion" placeholder="Descripcion de la macosta" required>
            </div>
            <div class="form-group">
                <label for="raza">Raza</label>
                <input type="text" name="raza" id="raza" placeholder="Raza del macosta" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" name="fecha" id="fecha" placeholder="Fecha nacimiento del macosta" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="text" name="correo" id="correo" placeholder="Correo del dueño">
            </div>
            <div class="form-group">
                <label for="correo">Celular</label>
                <input type="text" name="cell" id="cell" placeholder="Celular del dueño">
            </div>
            <div class="form-group">
                <label for="ubicacion">Direccion</label>
                <input type="text" name="ubicacion" id="ubicacion" placeholder="Direccion del dueño" required>
            </div>
            <div class="form-group">
                <label for="fechac">Fecha del cita</label>
                <input type="date" name="fechac" id="fechac" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora del cita</label>
                <input type="time" name="hora" id="hora" required>
            </div>
            
            <input type="submit" value="Insertar cita" name="insertar">
        </form>
    </div>
    
    
    <?php

require_once('class/agenda_funciones.php');
error_reporting(0);
$agenda = new Agenda();

if(isset($_POST['insertar'])){
    $categoria = $_POST['categoria'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $raza = $_POST['raza'];
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];
    $cell = $_POST['cell'];
    $ubicacion = $_POST['ubicacion'];
    $fechac = $_POST['fechac'];
    $hora = $_POST['hora'];

    $agenda = new Agenda();
    $resultado = $agenda->insertar_cita($categoria, $nombre, $descripcion, $raza, $fecha, $correo, $cell, $ubicacion, $fechac, $hora);
    if($resultado){
        echo "Cita insertada correctamente";
    }else{
        echo "Error al insertar la cita";
    }
}

?>   

</body>
</html>