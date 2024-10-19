const header = document.getElementById("masthead");

window.addEventListener("scroll", () => {
  if (window.scrollY > 100) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.querySelector(".menu-toggle");
  const mainNavigation = document.querySelector(".main-navigation");

  menuToggle.addEventListener("click", () => {
    mainNavigation.classList.toggle("active");
  });

  document.addEventListener("click", (event) => {
    if (
      !mainNavigation.contains(event.target) &&
      mainNavigation.classList.contains("active")
    ) {
      mainNavigation.classList.remove("active");
    }
  });
});
