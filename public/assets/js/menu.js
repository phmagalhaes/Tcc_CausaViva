let icon = document.getElementById("menu_icon");
let menu = document.getElementById("menu");
let barra1 = document.getElementById("barra1");
let barra2 = document.getElementById("barra2");
let barra3 = document.getElementById("barra3");
let menu_bar = document.getElementById("menu_bar");
let overlay = document.getElementById("overlay");

icon.addEventListener("click", function () {
    if (icon.classList.contains("close")) {
        menu_bar.style.opacity = "0";
        icon.classList.remove("close");
        icon.classList.add("open");
        menu_bar.style.right = "-30%";
        menu_bar.style.position = "fixed";
        overlay.style.display = "none";
        menu.style.position = "relative";
        setTimeout(() => {
            menu_bar.style.display = "none";
        }, 100);
    } else {
        menu_bar.style.display = "flex";
        setTimeout(() => {
            menu_bar.style.display = "flex";
            icon.classList.add("close");
            icon.classList.remove("open");
            menu_bar.style.right = "0";
            menu_bar.style.opacity = "1";
            menu_bar.style.position = "fixed";
            overlay.style.display = "block";
            menu.style.position = "fixed";
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        }, 100);
    }
});
