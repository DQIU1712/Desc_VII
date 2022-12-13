<?php
session_start();
?>
<?php
require_once('class/agenda_funciones.php');
//Obtener id de la tarea desde editar.php
$categoria=$_GET ['categoria'];
$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$raza = $_GET['raza'];
$fecha = $_GET['fecha'];
$correo = $_GET['correo'];
$cell = $_GET['cell'];
$ubicacion = $_GET['ubicacion'];
$fechac = $_GET['fechac'];
$hora = $_GET['hora'];
//Incluir la clase de base de datos
//Instanciar la clase de base de datos
$agenda = new Agenda();
//Ejecutar el método para actualizar
$agenda->actualizar_cita($categoria, $nombre, $descripcion, $raza, $fecha, $correo, $cell, $ubicacion, $fechac, $hora);
//Redireccionar a la página principal
//header('Location: index.php');
?>