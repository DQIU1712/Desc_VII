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
<h1>Filtro de citas</h1>
<div class="contenedor">
        <nav class="menu">
            
            <ul>
                <li><a href="index2.php">Agregar cita</a></li>
                <li><a href="citas.php">Mostrar citas</a></li>
                <li><a href="mostrar_todo.php">Buscar cita</a></li>
            </ul>
        </nav>
    </div>
    <br><br><br>
    <div class="container" id="caja">
    <h2>Para el filtro de fecha utilizar el formato yyyy-mm-ss</h2>
    <Form name="Formfiltro" method="post" action="mostrar_todo.php">
        <br/>
        Filtrar Por: 
        <SELECT name="campos">
            <OPTION value="categoria">Categoria
            <OPTION value="nombre">Nombre
            <OPTION value="descripcion" SELECTED>Descripcion
            <OPTION value="raza">Raza
            <OPTION value="fecha">Fecha
            <OPTION value="correo">Correo
            <OPTION value="cell">Cell
            <OPTION value="ubicacion">Ubicacion
            <OPTION value="fechac">Fecha cita
            <OPTION value="hora">Hora
                
            </OPTION>
        </SELECT>
       con el valor
        <input type="text" name="valor">
        <input name="ConsultarFiltro" value="Filtrar Datos" type="submit"/>
        <input name="ConsultarTodos" value="Ver Todos" type="submit"/>
    </Form>
    </div>
    <?php

    require_once('class/agenda_funciones.php');
    $obj_agenda = new Agenda();
    $agenda = $obj_agenda->mostrar_citas();
    error_reporting(0);

    if(array_key_exists('ConsultarTodos', $_POST)){
        $obj_agenda = new Agenda();
        $agenda = $obj_agenda->mostrar_citas();
    }

    if(array_key_exists('ConsultarFiltro', $_POST)){
        $obj_agenda = new Agenda();
        $agenda = $obj_agenda->mostrar_citas_filtro($_REQUEST['campos'], $_REQUEST['valor']);
    }

    $nfilas=count($agenda);
    // si hay citas mostrar mensaje
    if ($nfilas>0) {
        echo "<div class='contenedor'>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Categoria</th>";
        echo "<th>Nombre</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Raza</th>";
        echo "<th>Fecha</th>";
        echo "<th>Correo</th>";
        echo "<th>Cell</th>";
        echo "<th>Ubicacion</th>";
        echo "<th>Fecha cita</th>";
        echo "<th>Hora cita</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($agenda as $cita) {
            echo "<tr>";
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
            echo "<td>";
            echo "<a href='editar.php?id=" . $cita['id'] . "'>Editar</a>";
            echo " | ";
            echo "<a href='mostrar_todo.php?id=" . $cita['id'] . "'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='contenedor'>";
        echo "<h2>No hay citas</h2>";
        echo "</div>";
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