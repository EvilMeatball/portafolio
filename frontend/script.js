function openPopup(src, title, desc) {
  document.getElementById("popup-img").src = src;
  document.getElementById("popup-title").innerText = title;
  document.getElementById("popup-desc").innerText = desc;
  document.getElementById("popup").style.display = "flex";
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
}

// SLIDER AUTOMÁTICO FEATURED WORK
document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector('.slider');
  const slides = document.querySelectorAll('.slider-item');
  let currentIndex = 0;

  function showSlide(index) {
    const width = slides[0].clientWidth;
    slider.style.transform = `translateX(-${index * width}px)`;
  }

  document.querySelector('.prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    showSlide(currentIndex);
  });

  document.querySelector('.next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
  });

  // Auto slide
  setInterval(() => {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
  }, 5000);
});

window.addEventListener('DOMContentLoaded', () => {
  document.querySelector('.section-title').classList.add('animate-text');
});

// Ocultar barra de navegación al bajar
let prevScrollPos = window.pageYOffset;
window.onscroll = () => {
  const nav = document.querySelector('nav');
  const currentScrollPos = window.pageYOffset;
  if (prevScrollPos > currentScrollPos) {
    nav.classList.remove('hide');
  } else {
    nav.classList.add('hide');
  }
  prevScrollPos = currentScrollPos;
};