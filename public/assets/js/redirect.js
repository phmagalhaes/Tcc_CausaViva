let cards = document.getElementsByClassName("card");

for(let i = 0; i < cards.length; i++){
    cards[i].addEventListener("click", function(){
        window.location.href = `/ong/${cards[i].id}`;
    })
}


let form = document.getElementById("searchForm");
let input = document.getElementById("searchInput");
let select = document.getElementById("categoriaSelect");

input.addEventListener("input", function () {
    form.submit();
});

select.addEventListener("change", function () {
    form.submit();
});
