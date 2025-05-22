<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Cadastro da ONG</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/cadastroONG.css') }}" />
    <script src="{{ asset('/assets/js/cadastroONG.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <x-msg />

    <!-- form do cadastro da ONG -->
    <a href="{{ route('index') }}">
        <img src="../assets/images/logoAuth.png" alt="logoAuth" class="logo_link" />
    </a>
    <h1>Faça o cadastro da sua ONG!</h1>
    <main>
        <form action="{{ route('ong.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <section class="cadastroOng">
                <div class="upload-container">
                    <label class="picture" for="picture__input" tabIndex="0">
                        <span class="picture__image"></span>
                    </label>
                    <input type="file" name="logo" id="picture__input" style="display: none;"
                        accept="image/png, image/jpeg, image/jpg">
                </div>
                <div class="inputs_logo">
                    <div class="nome">
                        <label for="ONG">Nome da ONG</label>
                        <input required type="text" name="nome" placeholder="Digite o nome da ong" />
                    </div>

                    <div class="dono">
                        <label for="dono">Nome do(s) dono(s)</label>
                        <input required type="text" name="donos" placeholder="Digite o seu nome" />
                    </div>
                </div>
            </section>

            <section class="section1">
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

                <div class="password">
                    <label for="password">Confirme Senha</label>
                    <div class="senha_input">
                        <input id="input2" type="password" name="password_confirmation" placeholder="Confirme sua senha" required>
                        <div id="olho2" class="olho">
                            <i id="olhinho2" class="fa fa-eye" id="toggleSenha"></i>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="causa">
                    <label for="causa">Causa</label>
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

                <div class="data">
                    <label for="data">Quando foi criada</label>
                    <input required type="date" name="data_criacao" id="" />
                </div>
                <div class="CPF_CNPJ">
                    <label for="CPF_CNPJ">CPF ou CNPJ </label>
                    <input required type="text" name="documento" oninput="mascaraCpfCnpj(this)" placeholder="Digite o seu CPF ou CNPJ" />
                </div>
            </section>

            <section>
                <div class="cep">
                    <label for="cep">Cep</label>
                    <input required name="cep" type="text" id="cep" value="" size="10"
                        maxlength="9" onblur="pesquisacep(this.value);" placeholder="Digite o cep da ong" />
                </div>

                <div class="bairro">
                    <label for="bairro">Bairro</label>
                    <input required type="text" id="bairro" name="bairro" placeholder="Digite o bairro da ong" />
                </div>

                <div class="cidade">
                    <label for="cidade">Cidade</label>
                    <input required type="text" id="cidade" name="cidade"
                        placeholder="Digite a cidade da ong" />
                </div>

                <div class="estado">
                    <label for="estado">Estado</label>
                    <input required type="text" id="uf" name="estado"
                        placeholder="Digite o estado da ong" />
                </div>
            </section>

            <section>
                <div class="rua">
                    <label for="rua">Rua</label>
                    <input required type="text" id="rua" name="rua"
                        placeholder="Digite a rua da ong" />
                </div>

                <div class="numero">
                    <label for="numero">Número</label>
                    <input required type="text" name="numero" placeholder="Digite o número da ong" />
                </div>
            </section>

            <section>
                <div class="telefone">
                    <label for="telefone">Telefone</label>
                    <input required type="text" name="telefone" oninput="mascaraTelefone(this)" placeholder="Digite o telefone  da ong" />
                </div>

                <div class="metaFinanceira">
                    <label for="metaFinanceira">Meta Financeira</label>
                    <input required type="text" name="meta_financeira" id="metaFinanceira"
                        placeholder="Digite a meta financeira da ong em reais" />
                </div>
            </section>

            <div class="necessidade">
                <label for="necessidade">Necessidades</label>
                <input required type="text" name="necessidades" placeholder="Digite as necessidades da ong" />
            </div>

            <section>
                <div class="descricao">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="" placeholder="Digite uma descrição da ong..."></textarea>
                </div>
                <div class="buttonSubmit">
                    <button type="submit">Enviar</button>
                    <a href="{{ route('login' )}}">Voltar para o login</a>
                </div>
            </section>
        </form>
    </main>
</body>

</html>
