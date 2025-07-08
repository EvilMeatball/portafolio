<?php
include 'conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Obtener el nombre de la imagen antes de borrar
    $query = "SELECT imagen FROM trabajos WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    $fila = mysqli_fetch_assoc($resultado);

    // Eliminar imagen del servidor
    if ($fila && file_exists($fila['imagen'])) {
        unlink($fila['imagen']);
    }

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM trabajos WHERE id = $id";
    mysqli_query($conn, $sql);
}

// Regresa al panel
header("Location: admin.php");
exit;
?>
