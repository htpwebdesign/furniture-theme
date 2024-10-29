document.addEventListener("DOMContentLoaded", () => {
  const header = document.getElementById("masthead");
  const menuToggle = document.querySelector(".menu-toggle");
  const mainNavigation = document.querySelector(".main-navigation");

  // 设置菜单的初始隐藏状态
  mainNavigation.classList.remove("active");

  // 滚动时控制 header 的 "scrolled" 类
  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });

  // 点击菜单按钮时切换 "active" 类
  menuToggle.addEventListener("click", (event) => {
    event.stopPropagation(); // 防止点击事件冒泡
    mainNavigation.classList.toggle("active");
  });

  // 点击页面其他地方时关闭菜单
  document.addEventListener("click", (event) => {
    if (
      !mainNavigation.contains(event.target) &&
      !menuToggle.contains(event.target) &&
      mainNavigation.classList.contains("active")
    ) {
      mainNavigation.classList.remove("active");
    }
  });
});
