let icon = document.getElementById("menu_icon");
let barra1 = document.getElementById("barra1");
let barra2 = document.getElementById("barra2");
let barra3 = document.getElementById("barra3");
let menu_bar = document.getElementById("menu_bar");

icon.addEventListener("click", function () {
    if (icon.classList.contains("close")) {
        menu_bar.style.opacity = "0";
        icon.classList.remove("close");
        icon.classList.add("open");
        menu_bar.style.right = "-30%";
        document.body.style.overflowY = "scroll";
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
            document.body.style.overflowY = "hidden";
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        }, 100);
    }
});
