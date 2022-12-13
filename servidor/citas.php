<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda del Cita Veterinaria</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <!-- Mostrar cabezera con la fecha actual -->
    <header>
        <div class="contenedor">
            <h1>citas para</h1>
            <!-- Mostrar la fecha actual menos 1 dia -->
            <h2><?php echo date('Y-m-d', strtotime('-1 day')); ?></h2>
        </div>

        <div class="contenedor">
        <nav class="menu">
            <ul>
                <li><a href="index.php">Agregar cita</a></li>
                <li><a href="citas.php">Mostrar citas</a></li>
                <li><a href="mostrar_todo.php">Buscar cita</a></li>
            </ul>
        </nav>
    </div><br><br><br>
        </div>

    </header>

    <!-- tabla para mostrar las citas -->
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
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
    <?php

    
    require_once ('class/agenda_funciones.php');
    error_reporting(0);
    // Mostrar taraeas para la fecha actual
    $agenda = new Agenda();
    $citas = $agenda->mostrar_citas_hoy(date('Y-m-d', strtotime(' day')));


    //si no hay citas para la fecha actual entonces mostrar mensaje
    if (empty($citas)) {
        echo "<tr><td colspan='11'>No hay citas para hoy</td></tr>";
    } else {
    //si hay citas para la fecha actual entonces mostrarlas
    foreach ($citas as $cita) {
        echo "<tr>";
        echo "<td>" . $cita['id'] . "</td>";
        echo "<td>" . $cita['categoria'] . "</td>";
        echo "<td>" . $cita['nombre'] . "</td>";
        echo "<td>" . $cita['descripcion'] . "</td>";
        echo "<td>" . $cita['raza'] . "</td>";
        echo "<td>" . $cita['fecha'] . "</td>";
        echo "<td>" . $cita['correo'] . "</td>";
        echo "<td>" . $cita['cell'] . "</td>";
        echo "<td>" . $cita['ubicacion'] . "</td>";
        echo "<td>" . $cita['fechac'] . "</td>";
        echo "<td>" . $cita['hora'] . "</td>";
        echo "<td><a href='editar.php?id=" . $cita['id'] . "'>Editar</a> | <a href='citas.php?id=" . $cita['id'] . "'>Eliminar</a></td>";
        echo "</tr>";
    }
}
    //Eliminar cita
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $obj_agenda = new Agenda();
        $obj_agenda->eliminar_cita($id);
    }

    ?>

</body>
</html>