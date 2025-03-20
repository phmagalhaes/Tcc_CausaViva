let cards = document.getElementsByClassName("card");

for(let i = 0; i < cards.length; i++){
    cards[i].addEventListener("click", function(){
        window.location.href = "../pages/telaONG.html"
    })
}