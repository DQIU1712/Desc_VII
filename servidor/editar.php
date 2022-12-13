<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Digital</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <!-- colocar titulo al centro -->
    <div class="contenedor">
        <h1>Modificar cita</h1>
    </div>
    <br>
    <!-- Menu con opciones Agregar, Mostrar y Buscar -->
    <div class="contenedor">
        <nav class="menu">
            <ul>
                <li><a href="index2.php">Agregar cita</a></li>
                <li><a href="citas.php">Mostrar citas</a></li>
                <li><a href="mostrar_todo.php">Buscar cita</a></li>
            </ul>
        </nav>
    </div><br>


    <!-- tabla para mostrar las citas -->
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Raza</th>
                    <th>Fecha NAC.</th>
                    <th>Correo</th>
                    <th>Cell</th>
                    <th>Ubicacion</th>
                    <th>Fecha Cita</th>
                    <th>Hora Cita</th>
                    <th>Acciones</th>
                </tr>
            </thead>

</body>


<?php

require_once('class/agenda_funciones.php');
$agenda = new Agenda();
$citas = $agenda->visualizar_cita($_GET['id']);

foreach ($citas as $cita) {
  
} 

?>

<form class="editar"  id="editar" action="actualizar.php">
<td><input type="hidden" name="id" value="<?php echo $cita['id']?>"></td>
<tr>
<td><input type="text" name="categoria" value="<?php echo $cita['categoria']?>"></td>
<td><input type="text" name="nombre" value="<?php echo $cita['nombre']?>"></td>
<td><input type="text" name="descripcion" value="<?php echo $cita['descripcion']?>"></td>
<td><input type='text' name='raza' value="<?php echo $cita['raza'] ?>"></td>
<td><input type="date" name="fecha" value="<?php echo $cita['fecha']?>"></td>
<td><input type="text" name="correo" value="<?php echo $cita['correo']?>"></td>
<td><input type="text" name="cell" value="<?php echo $cita['cell']?>"></td>
<td><input type="text" name="ubicacion" value="<?php echo $cita['ubicacion']?>"></td>
<td><input type="date" name="fechac" value="<?php echo $cita['fechac']?>"></td>
<td><input type="time" name="hora" value="<?php echo $cita['hora']?>"></td>
<td><input type="submit" value="actualizar"></td>
</tr>
</form>

</html>