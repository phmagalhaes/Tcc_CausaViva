let icon = document.getElementById("menu_icon");
let barra1 = document.getElementById("barra1");
let barra2 = document.getElementById("barra2");
let barra3 = document.getElementById("barra3");
let menu_bar = document.getElementById("menu_bar");

icon.addEventListener("click", function(){
    if(icon.classList.contains("close")){
        icon.classList.remove("close")
        icon.classList.add("open")
        menu_bar.style.right = "-30%";
    } else{
        icon.classList.add("close")
        icon.classList.remove("open")
        menu_bar.style.right = "0"
    }
})