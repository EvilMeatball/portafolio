fetch("../backend/obtener.php")
  .then((res) => res.json())
  .then((data) => {
    const contenedor = document.getElementById("contenedor");
    data.forEach((item) => {
      const div = document.createElement("div");
      div.className = "proyecto";
      div.innerHTML = `
        <img src="../backend/${item.imagen}" alt="">
        <h3>${item.titulo}</h3>
        <p>${item.descripcion || ""}</p>
      `;
      contenedor.appendChild(div);
    });
  });
