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

let input2 = document.getElementById("input2");
let olho2 = document.getElementById("olho2");
let olhinho2 = document.getElementById("olhinho2");

olho2.addEventListener("click", function(){
    if(input2.type == "password"){
        input2.type = "text";
        olhinho2.classList.replace("fa-eye", "fa-eye-slash");
    } else{
        input2.type = "password";
        olhinho2.classList.replace("fa-eye-slash", "fa-eye");
    }
})