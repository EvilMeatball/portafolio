<?php include('../backend/conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Portafolio</title>
<link rel="stylesheet" href="./style.css">
</head>
<body>

  <!-- 🔹 NAVBAR FIJA -->
  <nav class="navbar">
    <div class="logo">
      <img src="assets/logo.png" alt="Logo">
    </div>
    <ul class="nav-links">
      <li><a href="#about">About me</a></li>
      <li><a href="#ownworks">Own Works</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#featured">Featured Work</a></li>
      <li><a href="#footer">Contact</a></li>
    </ul>
  </nav>

  <!-- 🔹 SECCIÓN: About me -->
  <section id="about" class="parallax">
    <div class="about-text">
      <h1>About Me</h1>
      <p>Soy Luis Chávez, diseñador, ilustrador y programador. Bienvenido a mi portafolio profesional.</p>
    </div>
  </section>

  <!-- 🔹 SECCIÓN: Own Works -->
  <section id="ownworks">
    <h2>Own Works</h2>
    <div class="gallery">
      <?php
        $query = "SELECT * FROM trabajos WHERE categoria = 'my works' ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <div class="work-item">
              <img src="../backend/'.$row['imagen'].'" alt="'.$row['titulo'].'">
              <div class="overlay">
                <h3>'.$row['titulo'].'</h3>
                <p>'.$row['descripcion'].'</p>
                <small>'.$row['url'].'</small>
              </div>
            </div>';
        }
      ?>
    </div>
  </section>

  <!-- 🔹 SECCIÓN: Services -->
  <section id="services">
    <h2>Services</h2>
    <p>Ofrezco ilustración digital, diseño gráfico, desarrollo web y más servicios creativos.</p>
  </section>

  <!-- 🔹 SECCIÓN: Featured Work -->
  <section id="featured">
    <h2>Featured Work</h2>
    <div class="slider">
      <?php
        $query = "SELECT * FROM trabajos WHERE categoria = 'featured' ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <div class="slide">
              <img src="../backend/'.$row['imagen'].'" alt="'.$row['titulo'].'">
              <div class="slide-text">
                <h3>'.$row['titulo'].'</h3>
                <p>'.$row['descripcion'].'</p>
              </div>
            </div>';
        }
      ?>
    </div>
  </section>

  <!-- 🔹 SECCIÓN: Footer -->
  <footer id="footer">
    <div class="footer-content">
      <img src="assets/logo.png" alt="Logo" class="footer-logo">
      <p>Gracias por visitar mi portafolio.</p>
      <p>&copy; 2025 Luis Chávez. Todos los derechos reservados.</p>
      <a href="#about" class="scroll-top">↑ Volver al inicio</a>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>

