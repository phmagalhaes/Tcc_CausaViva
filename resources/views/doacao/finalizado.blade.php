<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Agradecimento</title>
  <style>
    body {
      background-color: #f9f9f9;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
    }

    #mensagem {
      font-size: 1.5rem;
      color: #333;
      max-width: 600px;
    }

    #link-boleto {
      display: none;
      margin-top: 20px;
      font-size: 1.2rem;
      color: #007bff;
      text-decoration: none;
    }

    #qrcode {
      display: none;
      margin-top: 20px;
      width: 200px;
      height: 200px;
    }
  </style>
</head>
<body>

<div id="mensagem"></div>
<a id="link-boleto" href="#" target="_blank">🔗 Abrir boleto</a>
<img id="qrcode" src="" alt="QR Code do boleto" />

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
      // Exibe link
      const link = document.getElementById("link-boleto");
      link.href = boletoUrl;
      link.style.display = "inline";

      // Exibe QR Code
      const qr = document.getElementById("qrcode");
      qr.src = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=" + encodeURIComponent(boletoUrl);
      qr.style.display = "block";

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