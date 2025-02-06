<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Causa Viva - Login</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
</head>
<body>
    <a href="../index.html">
        <img src="../assets/images/logoAuth.png" alt="logoAuth" class="logo">
    </a>
    <main>
        <!-- "form" do login -->
        <div class="form1">
            <p class="title">BEM VINDO</p>

            <p class="subtitle">Ficamos felizes em te ver denovo!</p class="subtitle">

            <img class="logoLogin" src="../assets/images/logoLogin.png" alt="logoLogin">

            <p class="subtitle">Ainda não possui uma conta?</p>

            <div>
                <a href="../pages/cadastroDOADOR.html">Faça seu cadastro</a>
            </div>
            <div>
                <a href="../pages/cadastroONG.html">Faça o cadastro da sua ONG</a>
            </div>
        </div>

        <div class="form2">
            <p class="title2">Faça seu login</p>
        
            <form action="">
                    <input type="email" name="emailLogin" placeholder="Email">

                    <input type="password" name="senhaLogin" placeholder="Senha">

                <button type="submit">Logar</button>
            </form>
        </div>
    </main>
</body>
</html>