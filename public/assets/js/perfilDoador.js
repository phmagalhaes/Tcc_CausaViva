const edit = document.getElementById("editar");
const save = document.getElementById("salvar");
const cancel = document.getElementById("cancelar");
const inputs = document.getElementsByClassName("input");

edit.addEventListener("click", function (event) {
  event.preventDefault;
  edit.disabled = true;
  save.disabled = false;
  cancel.disabled = false;
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].disabled = false;
  }
});

cancel.addEventListener("click", function () {
  setTimeout(() => {
    edit.disabled = false;
    save.disabled = true;
    cancel.disabled = true;
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].disabled = true;
    }
  }, 100);
});