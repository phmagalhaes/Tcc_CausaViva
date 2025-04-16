const inputFile = document.querySelector("#picture__input");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Adicionar fotos";
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture__img");

      pictureImage.innerHTML = "";
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage.innerHTML = pictureImageTxt;
  }
});

const meta = document.getElementById("metaFinanceira");
meta.addEventListener("input", function (e) {
    let value = e.target.value.replace(/\D/g, "");

    if (value.length > 8) {
        value = value.substring(0, 8);
    }

    value = (parseFloat(value) / 100).toFixed(2);

    value = value.replace(".", ",").replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    e.target.value = "R$ " + value;
});

const edit = document.getElementById("editar");
const save = document.getElementById("salvar");
const cancel = document.getElementById("cancelar");
const inputs = document.getElementsByClassName("input");
const confirm = document.getElementById("confirmeSenha");

edit.addEventListener("click", function (event) {
  event.preventDefault;
  edit.disabled = true;
  save.disabled = false;
  cancel.disabled = false;
  confirm.style.display = "block";
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].disabled = false;
  }
});

cancel.addEventListener("click", function () {
  setTimeout(() => {
    edit.disabled = false;
    save.disabled = true;
    cancel.disabled = true;
    confirm.style.display = "none";
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].disabled = true;
    }
  }, 100);
});