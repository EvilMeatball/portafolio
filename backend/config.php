<?php
$conexion = new mysqli("localhost", "root", "", "portafolio");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
