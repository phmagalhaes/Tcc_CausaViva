<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agredecimento</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/pagamentoFinalizado.css') }}">
    <link rel="stylesheet" href="{{ asset('./style.css') }}">7
    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">
</head>

<body>
    <a class="setaVoltar" href="{{ route('home') }}">
        <img src="{{ asset('/assets/images/iconeVoltar.png') }}" alt="">
    </a>

    <div class="image">
        <img src="{{ asset('./assets/images/icons/logoPagamento.png') }}" alt="">
    </div>

    <div id="mensagem"></div>

    <script>
        const boletoUrl = decodeURIComponent(@json($ticketUrl));

        let i = 0;
        const mensagem = "Muito obrigado por ajudar! Pode ter certeza que você fez a diferença";
        const speed = 50;
        let digitarJaExecutado = false;

        function digitar() {
            if (digitarJaExecutado) return;
            digitarJaExecutado = true;

            function escrever() {
                if (i < mensagem.length) {
                    document.getElementById("mensagem").innerHTML += mensagem.charAt(i);
                    i++;
                    setTimeout(escrever, speed);
                } else {
                    setTimeout(() => {
                        window.location.href = "{{ route('home') }}";
                    }, 4000);
                }
            }

            escrever();
        }

        window.onload = () => {
            if (boletoUrl) {
                // Abre nova aba com o boleto
                window.open(boletoUrl, '_blank');
            }

            // Aguarda o usuário voltar para a aba
            document.addEventListener("visibilitychange", () => {
                if (document.visibilityState === "visible") {
                    digitar();
                }
            });
        };
    </script>
</body>

</html>
