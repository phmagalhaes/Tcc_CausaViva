<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Cadastro da ONG</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/cadastroONG.css') }}" />
    <script src="{{ asset('/assets/js/cadastro.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <!-- form do cadastro da ONG -->
    <a href="../index.html">
        <img src="../assets/images/logoAuth.png" alt="logoAuth" />
    </a>
    <h1>Faça o cadastro da sua ONG!</h1>
    <main>
        <form action="">
            <section class="cadastroOng">
                <div class="upload-container">
                    <label class="picture" for="picture__input" tabIndex="0">
                        <span class="picture__image"></span>
                    </label>
                    <input type="file" name="picture__input" id="picture__input">
                </div>
                <div class="inputs_logo">
                    <div class="nome">
                        <label for="ONG">Nome da ONG</label>
                        <input type="text" name="ONG" placeholder="Digite o nome da ong" />
                    </div>

                    <div class="dono">
                        <label for="dono">Nome do(s) dono(s)</label>
                        <input type="text" name="dono" placeholder="Digite o seu nome" />
                    </div>
                </div>
            </section>

            <section>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Digite o seu email" />
                </div>

                <div class="password">
                    <label for="password">Senha</label>
                    <input type="password" name="password" placeholder="Digite a sua senha" />
                </div>

                <div class="password">
                    <label for="password">Confirme Senha</label>
                    <input type="password" name="password" placeholder="Confirme a sua senha" />
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
                    <input type="date" name="data" id="" />
                </div>
                <div class="fotoVideo">
                    <label for="fotoVideo">Foto e vídeo </label>
                    <input type="file" name="fotoVideo" placeholder="Adicione fotos e vídeos..." />
                </div>
            </section>

            <section>
                <div class="cep">
                    <label for="cep">Cep</label>
                    <input type="text" name="cep" placeholder="Digite o cep da ong" />
                </div>

                <div class="bairro">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" placeholder="Digite o bairro da ong" />
                </div>

                <div class="cidade">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" placeholder="Digite a cidade da ong" />
                </div>

                <div class="estado">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" />
                </div>
            </section>

            <section>
                <div class="rua">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" placeholder="Digite a rua da ong" />
                </div>

                <div class="numero">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" placeholder="Digite o número da ong" />
                </div>
            </section>

            <section>
                <div class="telefone">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" placeholder="Digite o telefone  da ong" />
                </div>

                <div class="metaFinanceira">
                    <label for="metaFinanceira">Meta Financeira</label>
                    <input type="text" name="metaFinanceira" placeholder="Digite a meta financeira da ong" />
                </div>
            </section>

            <div class="necessidade">
                <label for="necessidade">Necessidades</label>
                <input type="text" name="necessidade" placeholder="Digite as necessidades da ong" />
            </div>

            <section>
                <div class="descricao">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="" placeholder="Digite uma descrição da ong..."></textarea>
                </div>
                <div class="buttonSubmit">
                    <button type="submit">Enviar</button>
                    <a href="./login.html">Voltar para o login</a>
                </div>
            </section>
        </form>
    </main>
</body>

</html>
