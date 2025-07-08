<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $url = $_POST['url'];

    // Subir imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $carpeta_destino = "uploads/" . $imagen_nombre;

    if (move_uploaded_file($imagen_temp, $carpeta_destino)) {
        $ruta_imagen = $carpeta_destino;

        $sql = "INSERT INTO trabajos (titulo, descripcion, imagen, categoria, url)
                VALUES ('$titulo', '$descripcion', '$ruta_imagen', '$categoria', '$url')";

        if (mysqli_query($conn, $sql)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Error al guardar en la base de datos.";
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>
