const inputFile = document.querySelector("#picture__input");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Insira sua logo aqui";
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

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById("rua").value = "";
    document.getElementById("bairro").value = "";
    document.getElementById("cidade").value = "";
    document.getElementById("uf").value = "";
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById("rua").value = conteudo.logradouro;
        document.getElementById("bairro").value = conteudo.bairro;
        document.getElementById("cidade").value = conteudo.localidade;
        document.getElementById("uf").value = conteudo.uf;
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, "");

    //Verifica se campo cep possui valor informado.
    if (cep != "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById("rua").value = "...";
            document.getElementById("bairro").value = "...";
            document.getElementById("cidade").value = "...";
            document.getElementById("uf").value = "...";

            //Cria um elemento javascript.
            var script = document.createElement("script");

            //Sincroniza com o callback.
            script.src =
                "https://viacep.com.br/ws/" +
                cep +
                "/json/?callback=meu_callback";

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}

let input = document.getElementById("input");
let olho = document.getElementById("olho");
let olhinho = document.getElementById("olhinho");

olho.addEventListener("click", function () {
    if (input.type == "password") {
        input.type = "text";
        olhinho.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        input.type = "password";
        olhinho.classList.replace("fa-eye-slash", "fa-eye");
    }
});

let input2 = document.getElementById("input2");
let olho2 = document.getElementById("olho2");
let olhinho2 = document.getElementById("olhinho2");

olho2.addEventListener("click", function () {
    if (input2.type == "password") {
        input2.type = "text";
        olhinho2.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        input2.type = "password";
        olhinho2.classList.replace("fa-eye-slash", "fa-eye");
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
