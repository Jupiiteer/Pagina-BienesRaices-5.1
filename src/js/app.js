document.addEventListener("DOMContentLoaded", () => {
  events();
});

function events() {
  mobileMenu();
  darkMode();
}

function darkMode() {
  const preferencia = window.matchMedia("(prefers-color-scheme: dark)");
  if (preferencia.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  preferencia.addEventListener("change", () => {
    if (preferencia.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", () => {
    if (document.body.classList.contains("dark-mode")) {
      document.body.classList.remove("dark-mode");
    } else {
      document.body.classList.add("dark-mode");
    }
  });
}

function mobileMenu() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", () => {
    const navegacion = document.querySelector(".navegacion");
    if (navegacion.classList.contains("mostrar")) {
      navegacion.classList.remove("mostrar");
    } else {
      navegacion.classList.add("mostrar");
    }
  });
}
