<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" href="admin.css">

  <meta charset="UTF-8">
  <title>Panel de Administrador</title>
  <style>
  input[type="text"] {
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  button {
    margin-top: 3px;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    background-color: #2d89ef;
    color: white;
    cursor: pointer;
  }

  button:hover {
    background-color: #1b5fa7;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  td, th {
    padding: 10px;
    text-align: left;
  }

  img {
    max-width: 100px;
    border-radius: 8px;
  }
</style>

</head>
<body>
  <h1>Panel de Administración</h1>
  <?php
    if (isset($_GET['mensaje'])) {
      $mensaje = '';
      $color = '';
      if ($_GET['mensaje'] === 'editado') {
        $mensaje = "✅ Contenido actualizado correctamente.";
        $color = "green";
      } elseif ($_GET['mensaje'] === 'subido') {
        $mensaje = "📁 Contenido subido con éxito.";
        $color = "blue";
      }

      if ($mensaje !== '') {
        echo "<p id='mensaje' style='color: $color; text-align:center; font-weight:bold;'>$mensaje</p>";
      }
    }
  
  ?>
  <form action="guardar.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="titulo" placeholder="Título" required><br>
    <textarea name="descripcion" placeholder="Descripción (opcional)"></textarea><br>
    <input type="file" name="imagen" accept="image/*" required><br>
    <button type="submit">Guardar</button>
    
    <select name="categoria" required>
      <option value="featured">Featured</option>
      <option value="my works">My Works</option>
    </select><br>

    <input type="text" name="url" placeholder="URL (opcional)"><br>

    <button type="submit">Subir</button>
    </form>
  <?php
include 'conexion.php';
$result = mysqli_query($conn, "SELECT * FROM trabajos ORDER BY id DESC");
?>

<h2>Contenido subido:</h2>
<table border="1" cellpadding="5">
  <tr>
    <th>Imagen</th>
    <th>Título</th>
    <th>Descripción</th>
    <th>Categoría</th>
    <th>Enlace</th>
    <th>Acciones</th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><img src="<?php echo $row['imagen']; ?>" width="100"></td>
    
    <!-- Formulario editable en línea -->
    <form action="guardar.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <td><input type="text" name="titulo" value="<?php echo htmlspecialchars($row['titulo']); ?>"></td>
      <td><input type="text" name="descripcion" value="<?php echo htmlspecialchars($row['descripcion']); ?>"></td>
      <td><?php echo $row['categoria']; ?></td>
      <td><a href="<?php echo $row['url']; ?>" target="_blank">Ver</a></td>
      <td>
        <button type="submit">Actualizar</button>
    </form>
    
    <!-- Botón eliminar como antes -->
    <form action="eliminar.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esto?');" style="margin-top:5px;">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <button type="submit">Eliminar</button>
    </form>
    </td>
  </tr>
<?php } ?>

</table>
<script>
  window.addEventListener("DOMContentLoaded", () => {
    const mensaje = document.getElementById("mensaje");
    if (mensaje) {
      setTimeout(() => {
        mensaje.style.opacity = "0";
        setTimeout(() => {
          mensaje.remove();
          // Elimina el parámetro ?mensaje=... de la URL sin recargar
          const url = new URL(window.location);
          url.searchParams.delete('mensaje');
          window.history.replaceState({}, document.title, url.pathname);
        }, 500); // Espera un poco más antes de quitarlo del DOM
      }, 3000); // Espera 3 segundos antes de desvanecer
    }
  });
</script>

</body>
</html>
