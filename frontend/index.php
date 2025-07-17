<?php include('../backend/conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <title>Portafolio</title>
<link rel="stylesheet" href="./style.css">
</head>
<body id="top">
  <div class="animated-bg"></div>
  <!-- 🔹 NAVBAR FIJA -->
  <nav class="navbar">
    <div class="logo">
      <a href="#top">
        <img src="../backend/imagenes/logo.png" alt="Logo" class="logo-navbar">
      </a>
    </div>
    <ul class="nav-links">
      <li><a href="#about">About me</a></li>
      <li><a href="#ownworks">Own Works</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#featured">Featured Work</a></li>
      <li><a href="#footer">Contact</a></li>
    </ul>
  </nav>

<!-- 🔹 SECCIÓN: PORTAFOLIO (Título principal con animación) -->
  <section class="section">
    <h1 class="animated-title">PORTAFOLIO WEB</h1>
  </section>

  <!-- 🔹 SECCIÓN: About me -->
  <section id="about">
    <h2 class="section-title">About Me</h2>
    <div class="section-content">
      <p>
        Soy Luis Chávez, estudio actualmente Diseño digital de Medios Interactivos en la universidad UACJ en el campus IADA, desarrollador y diseñador  con experiencia en creación de Ilustraciones, diseño de personajes, 
        modelado 3D, interfaces web y programación web, base de datos, manejo de APIs además de diseño UX/UI.
      </p>
    </div>
  </section>


  <!-- 🔹 SECCIÓN: Own Works -->
  <section id="ownworks">
    <h2 class="section-title">Own Works</h2>
    <div class="gallery">
      <?php
        include '../backend/conexion.php';
        $query = "SELECT * FROM trabajos WHERE categoria = 'my works'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <div class="work-item">
              <img class="work-img" src="../backend/' . $row["imagen"] . '" alt="' . $row["titulo"] . '"
                onclick="openPopup(\'../backend/' . $row["imagen"] . '\', \'' . addslashes($row["titulo"]) . '\', \'' . addslashes($row["descripcion"]) . '\')">
            </div>';
        }
      ?>

    </div>
    <div id="popup" class="popup fade-in" style="display:none;">
      <div class="popup-content">
        <span class="close" onclick="closePopup()">×</span>
        <img id="popup-img" src="" alt="">
        <h3 id="popup-title"></h3>
        <p id="popup-desc"></p>
      </div>
    </div>

  </section>
  

  <!-- 🔹 SECCIÓN: Services -->
  <section id="services">
    <h2 class="section-title">Services</h2>
    <div class="services-list">
      <div class="service-card">
        <h3>🖌️ Artista Digital</h3>
        <p>
          Como ilustrador digital, trabajo como freelancer realizando comisiones para una amplia variedad de clientes. Me especializo en diseño, rediseño y arte conceptual. Desarrollo desde bocetos iniciales hasta ilustraciones totalmente renderizadas, adaptándome a las necesidades de cada proyecto. En muchos casos, también creo la identidad visual de negocios o páginas web. Mantengo una comunicación constante con mis clientes a través de redes sociales, revisando avances y aclarando dudas en cada etapa del proceso.
        </p>
      </div>
      <div class="service-card">
        <h3>🎮 Game Art & Assets</h3>
        <p>
          Me apasiona crear arte para videojuegos, incluyendo sprites, fondos y otros assets visuales, especialmente en estilo pixel art. Aunque aún me encuentro en proceso de formación en esta área, practico regularmente para mejorar mi velocidad de producción y adaptarme a los diferentes estilos y formatos que requiere cada tipo de proyecto. Este trabajo me permite explorar nuevas técnicas y prepararme para futuras colaboraciones en el mundo del desarrollo de videojuegos.
        </p>
      </div>
      <div class="service-card">
        <h3>📱 UI/UX Design</h3>
        <p>
          También participo en el diseño de interfaces de usuario (UI) y experiencias de usuario (UX), colaborando con desarrolladores frontend para crear sitios web intuitivos, funcionales y visualmente atractivos. Me enfoco en lograr una navegación clara y coherente, cuidando tanto la estética como la usabilidad. Mis diseños buscan resolver problemas reales de los usuarios y mejorar la interacción con los productos digitales, desde wireframes hasta prototipos finales.
        </p>
      </div>
    </div>
  </section>


  <!-- 🔹 SECCIÓN: Featured Work -->
  <section id="featured" class="section">
    <h2 class="section-title">Featured Work</h2>
    <div class="gallery">
      <?php
        $query = "SELECT * FROM trabajos WHERE categoria = 'featured' ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <div class="work-item">
              <img class="work-img" src="../backend/'.$row['imagen'].'" alt="'.$row['titulo'].'"
                onclick="openPopup(\'../backend/'.$row["imagen"].'\', \''.addslashes($row["titulo"]).'\', \''.addslashes($row["descripcion"]).'\')">
              <h3>'.$row['titulo'].'</h3>
              <p>'.$row['descripcion'].'</p>
            </div>';
        }
      ?>
    </div>
  </section>

  <!-- 🔹 SECCIÓN: Footer -->
  <footer id="footer">
    <div class="footer-content">
      <img src="../backend/imagenes/logo.png" alt="Logo" class="footer-logo">
      <p>Gracias por visitar mi portafolio.</p>
      <p>&copy; 2025 Luis Chávez. Todos los derechos reservados.</p>
      <a href="#about" class="scroll-top">↑ Volver al inicio</a>
    </div>
    <div class="social-icons">
      <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
      <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
      <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>

