<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Detectar si se trata de una edición
    if (!empty($_POST['id'])) {
        // Modo edición
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE trabajos SET titulo = ?, descripcion = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $titulo, $descripcion, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: admin.php?mensaje=editado");
            exit;
        } else {
            echo "❌ Error al actualizar: " . mysqli_error($conn);
        }

    } else {
        // Modo creación (subir nuevo proyecto)
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $url = $_POST['url'];

        // Subida de imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen_nombre = $_FILES['imagen']['name'];
            $imagen_temp = $_FILES['imagen']['tmp_name'];
            $nombre_final = uniqid() . "-" . $imagen_nombre;
            $carpeta_destino = "uploads/" . $nombre_final;

            if (move_uploaded_file($imagen_temp, $carpeta_destino)) {
                $ruta_imagen = $carpeta_destino;

                $sql = "INSERT INTO trabajos (titulo, descripcion, imagen, categoria, url)
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssss", $titulo, $descripcion, $ruta_imagen, $categoria, $url);

                if (mysqli_stmt_execute($stmt)) {
                    header("Location: admin.php?mensaje=subido");
                    exit;
                } else {
                    echo "❌ Error al guardar en la base de datos: " . mysqli_error($conn);
                }
            } else {
                echo "❌ Error al mover la imagen.";
            }
        } else {
            echo "❌ Imagen no subida correctamente.";
        }
    }
}
?>
