<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Cadastro do Doador</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/cadastroDOADOR.css') }}" />
    <link rel="stylesheet" href="{{ asset('./style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="{{ asset('assets/js/cadastroDOADOR.js') }}" defer></script>
</head>

<body>
    <x-msg />

    <!-- form do cadastro da ONG -->
    <a href="{{ route('index') }}">
        <img src="../assets/images/logoAuth.png" alt="logoAuth" />
    </a>
    <h1>Faça o seu cadastro!</h1>
    <main>
        <form action="{{ route('doador.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="nome">
                <label for="DOADOR">Nome</label>
                <input required type="text" name="nome" placeholder="Digite o seu nome" />
            </div>

            <section>
                <div class="email">
                    <label for="email">Email</label>
                    <input required type="email" name="email" placeholder="Digite o seu email" />
                </div>

                <div class="password">
                    <label for="password">Senha</label>
                    <div class="senha_input">
                        <input id="input" type="password" name="password" placeholder="Digite sua senha" required>
                        <div id="olho" class="olho">
                            <i id="olhinho" class="fa fa-eye" id="toggleSenha"></i>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="confirmePassword">
                    <label for="password">Confirme Senha</label>
                    <div class="senha_input">
                        <input id="input2" type="password" name="password_confirmation" placeholder="Confirme sua senha" required>
                        <div id="olho2" class="olho">
                            <i id="olhinho2" class="fa fa-eye" id="toggleSenha"></i>
                        </div>
                    </div>
                </div>
                <div class="causa">
                    <label for="causa">Causa Preferida</label>
                    <select name="causa" id="">
                        <option value="Proteção Animal">Proteção Animal</option>
                        <option value="Direitos Humanos e Sociais">
                            Direitos Humanos e Sociais
                        </option>
                        <option value="Meio Ambiente">Meio Ambiente</option>
                        <option value="Saúde e Bem-Estar">Saúde e Bem-Estar</option>
                        <option value="Educação e Cultura">Educação e Cultura</option>
                    </select>
                </div>
            </section>

            <section>
                <div class="telefone">
                    <label for="telefone">Telefone</label>
                    <input required type="text" name="telefone" placeholder="Digite o seu telefone" />
                </div>

                <div class="buttonSubmit submitMedia">
                    <button type="submit">Enviar</button>
                </div>

                <div class="buttonsMedia">
                    <button type="submit">Enviar</button>
                    <a href="{{ route('login') }}">Voltar para o login</a>
                </div>

            </section>
            <section class="aMedia">
                <a href="{{ route('login') }}">Voltar para o login</a>
            </section>
        </form>
    </main>
</body>

</html>
