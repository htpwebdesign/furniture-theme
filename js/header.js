document.addEventListener("DOMContentLoaded", () => {
  const header = document.getElementById("masthead");
  const menuToggle = document.querySelector(".menu-toggle");
  const mainNavigation = document.querySelector(".main-navigation");
  const iconMenu = document.querySelector(".icon-menu");
  const iconClose = document.querySelector(".icon-close");

  mainNavigation.classList.remove("active");

  if (window.innerWidth > 768) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  }

  menuToggle.addEventListener("click", (event) => {
    event.stopPropagation();
    const isActive = mainNavigation.classList.toggle("active");
    iconMenu.style.display = isActive ? "none" : "block";
    iconClose.style.display = isActive ? "block" : "none";
  });

  window.addEventListener("load", () => {
    document.body.classList.remove("preload");
  });

  document.addEventListener("click", (event) => {
    if (
      !mainNavigation.contains(event.target) &&
      !menuToggle.contains(event.target) &&
      mainNavigation.classList.contains("active")
    ) {
      mainNavigation.classList.remove("active");
      iconMenu.style.display = "block";
      iconClose.style.display = "none";
    }
  });
});
