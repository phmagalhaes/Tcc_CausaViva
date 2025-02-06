<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Cadastro do Doador</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/cadastroDOADOR.css') }}" />
    <link rel="stylesheet" href="{{ asset('/style.css') }}" />
  </head>
  <body>
    <!-- form do cadastro da ONG -->
    <a href="../index.html">
      <img src="../assets/images/logoAuth.png" alt="logoAuth" />
    </a>
    <h1>Faça o seu cadastro!</h1>
    <main>
      <form action="">
        <div class="nome">
          <label for="DOADOR">Nome</label>
          <input type="text" name="DOADOR" placeholder="Digite o seu nome" />
        </div>

        <section>
          <div class="email">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Digite o seu email" />
          </div>

          <div class="password">
            <label for="password">Senha</label>
            <input
              type="password"
              name="password"
              placeholder="Digite a sua senha"
            />
          </div>
        </section>

        <section>
          <div class="confirmePassword">
            <label for="password">Confirme Senha</label>
            <input
              type="password"
              name="password"
              placeholder="Confirme a sua senha"
            />
          </div>
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
        </section>

        <section>
          <div class="telefone">
            <label for="telefone">Telefone</label>
            <input
              type="text"
              name="telefone"
              placeholder="Digite o telefone  da ong"
            />
          </div>
          <div class="buttonSubmit">
            <button type="submit">Enviar</button>
          </div>
        </section>
        <section>
          <a href="./login.html">Voltar para o login</a>
        </section>
      </form>
    </main>
  </body>
</html>
