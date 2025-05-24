<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Causa Viva - Login</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="{{ asset('assets/js/login.js') }}" defer></script>
</head>

<body>
    <x-msg />

    <a href="{{ route('index') }}">
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
                <a href="{{ route('doador.create') }}">Faça seu cadastro</a>
            </div>
            <div>
                <a href="{{ route('ong.create') }}">Faça o cadastro da sua ONG</a>
            </div>
        </div>

        <div class="form2">
            <p class="title2">Faça seu login</p>

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                @method('POST')
                <input type="email" name="email" placeholder="Email" required>

                <div class="senha_input">
                    <input id="input" type="password" name="senha" placeholder="Senha" required>
                    <div id="olho" class="olho">
                        <i id="olhinho" class="fa fa-eye" id="toggleSenha"></i>
                    </div>
                </div>

                <button type="submit">Logar</button>
                @if (session('errorMsg'))
                    <p class="errorMsg">{{ session('errorMsg') }}</p>
                @endif
            </form>

            <div class="links">
                <div class="login_link">
                    <a href="../pages/cadastroDOADOR.html">Faça seu cadastro</a>
                </div>
                <div class="login_link">
                    <a href="../pages/cadastroONG.html">Faça o cadastro da sua ONG</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
