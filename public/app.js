function mobileMenu() {
    const menu = document.querySelector(".nav-menu");
    const burger = document.createElement("div");
    burger.className = "burger";

    burger.addEventListener("click", (e) => {
        menu.classList.add("show");
    });
    const closeMenuBtn = document.createElement("div");
    closeMenuBtn.className = "close-menu";
    closeMenuBtn.addEventListener("click", (e) => {
        menu.classList.remove("show");
    });
    const header = document.querySelector(".header");
    const headerContainer = header.querySelector(".header__container");
    headerContainer.append(burger);
    menu.prepend(closeMenuBtn);
}

window.addEventListener("load", (e) => {
    const overlay = document.querySelector(".overlay");
    overlay.classList.add("loaded");
    document.documentElement.style.overflow = "auto";
    setTimeout(() => {
        overlay.remove();
    }, 300);
});

document.addEventListener("DOMContentLoaded", (e) => {
    if (screen.availWidth <= 1024) {
        mobileMenu();
    }
});
