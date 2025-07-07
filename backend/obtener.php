<?php
include "config.php";

$resultado = $conexion->query("SELECT * FROM proyectos ORDER BY id DESC");

$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

echo json_encode($datos);
?>
