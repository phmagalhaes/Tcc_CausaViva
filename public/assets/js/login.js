let input = document.getElementById("input");
let olho = document.getElementById("olho");
let olhinho = document.getElementById("olhinho");

olho.addEventListener("click", function(){
    if(input.type == "password"){
        input.type = "text";
        olhinho.classList.replace("fa-eye", "fa-eye-slash");
    } else{
        input.type = "password";
        olhinho.classList.replace("fa-eye-slash", "fa-eye");
    }
})