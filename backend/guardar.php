<?php
include "config.php";

$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];

$nombreImagen = "";

if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
    $nombreImagen = "uploads/" . time() . "_" . basename($_FILES["imagen"]["name"]);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $nombreImagen);
}

$stmt = $conexion->prepare("INSERT INTO proyectos (titulo, descripcion, imagen) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $titulo, $descripcion, $nombreImagen);
$stmt->execute();

header("Location: admin.php");
?>
