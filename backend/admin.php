<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Admin</title>
</head>
<body>
  <h1>Panel de Administración</h1>
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
      <td><?php echo $row['titulo']; ?></td>
      <td><?php echo $row['descripcion']; ?></td>
      <td><?php echo $row['categoria']; ?></td>
      <td><a href="<?php echo $row['url']; ?>" target="_blank">Ver</a></td>
      <td>
        <form action="eliminar.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esto?');">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <button type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
  <?php } ?>
</table>

</body>
</html>
