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
  </form>
</body>
</html>
