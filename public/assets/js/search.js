let form = document.getElementById("searchForm");
let input = document.getElementById("searchInput");
let select = document.getElementById("categoriaSelect");

input.addEventListener("input", function () {
    form.submit();
});

select.addEventListener("change", function () {
    form.submit();
});
