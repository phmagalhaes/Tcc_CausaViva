<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/paginaInicial.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <script src="{{ asset('/assets/js/redirect.js') }}" defer></script>
  </head>
  <body>
    <header>
      <main>
        <a href="{{ route('home') }}">
          <img src="{{ asset('/assets/images/Logo Header.png') }}" alt="logo" />
        </a>
        <nav>
          <a href="{{ route("ong.create") }}">Cadastre sua ONG</a>
          <a href="{{ route("doador.create") }}">Seja um doador</a>
        </nav>
      </main>
      <div class="slogan">
        <p>Conectando corações, transformando vidas!</p>
      </div>
    </header>

    <main>
      <section class="ongs">
        <p class="title">Projetos em destaque</p>
        <div class="cards">
          <div class="card">
            <div class="img">
              <img src="./assets/images/card1.png" alt="" />
              <p class="ong">Pata amiga</p>
            </div>
            <p class="description">
              Somos uma ONG que resgata, cuida e promove a adoção de cachorros
              abandonados, oferecendo também serviços de castração e vacinação.
              Junte-se a nós para mudar vidas!
            </p>
            <div class="meta">
              <div class="grafico">
                <div class="total"></div>
              </div>
              <div class="legenda">
                <p>112%</p>
                <p>R$14.000 Arrecadados</p>
                <p>10 dias restantes</p>
              </div>
            </div>
            <div class="bottom">
              <div class="cidade">
                <i class="fa-solid fa-location-dot"></i>
                <p>São Paulo, SP</p>
              </div>
              <div class="causa">
                <i class="fa-solid fa-tag"></i>

                <p>Proteção Animal</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/images/card2.png" alt="" />
              <p class="ong">WWF Brasil</p>
            </div>
            <p class="description">
              Somos uma ONG dedicada ao reflorestamento, restaurando
              ecossistemas e combatendo o desmatamento. Plantamos árvores
              nativas e promovemos a conscientização ambiental. Junte-se a nós
              para preservar o futuro do planeta!
            </p>
            <div class="meta">
              <div class="grafico">
                <div class="total noventa"></div>
              </div>
              <div class="legenda">
                <p>90%</p>
                <p>R$8.500 Arrecadados</p>
                <p>30 dias restantes</p>
              </div>
            </div>
            <div class="bottom">
              <div class="cidade">
                <i class="fa-solid fa-location-dot"></i>
                <p>São Paulo, SP</p>
              </div>
              <div class="causa">
                <i class="fa-solid fa-tag"></i>

                <p>Meio Ambiente</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/images/card3.png" alt="" />
              <p class="ong">Pão e esperança</p>
            </div>
            <p class="description">
              Somos uma ONG que luta para erradicar a fome nas ruas,
              distribuindo alimentos e oferecendo suporte a pessoas em situação
              de vulnerabilidade. Junte-se a nós para transformar vidas!
            </p>
            <div class="meta">
              <div class="grafico">
                <div class="total oitenta"></div>
              </div>
              <div class="legenda">
                <p>80%</p>
                <p>R$12.500 Arrecadados</p>
                <p>30 dias restantes</p>
              </div>
            </div>
            <div class="bottom">
              <div class="cidade">
                <i class="fa-solid fa-location-dot"></i>
                <p>São Paulo, SP</p>
              </div>
              <div class="causa">
                <i class="fa-solid fa-tag"></i>

                <p>Direitos Humanos e Sociais</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="sobre" id="sobre">
        <p class="title">Sobre nós</p>
        <article>
          <p>
            A <strong>Causa Viva</strong> nasceu para conectar corações e
            transformar vidas. Acreditamos no poder da
            <strong>solidariedade</strong> e na importância de unir ONGs a
            doadores dispostos a <strong>fazer a diferença</strong>. Nossa
            plataforma permite que ONGs se cadastrem,
            <strong>compartilhem suas causas, projetos e necessidades</strong>,
            enquanto doadores encontram oportunidades para
            <strong>contribuir</strong>, seja por doações ou voluntariado.
            Juntos, criamos uma rede de <strong>impacto</strong> positivo,
            tornando a solidariedade mais acessível e eficiente.
          </p>
          <img src="./assets/images/ong.png" alt="quem somos" />
        </article>
      </section>

      <section class="causas">
        <p class="title">Causas Apoiadas</p>
        <div class="causas_cards">
          <div class="causa_card">
            <div class="card_inner">
              <div class="face front">
                <img src="./assets/images/image.png" alt="" />
              </div>
              <div class="face back">
                <p class="descricao">
                  Garantem direitos fundamentais, promovem a inclusão social e
                  combatem a discriminação. Oferecem assistência jurídica, apoio
                  a grupos vulneráveis e atuam na defesa da igualdade.
                </p>
              </div>
            </div>
            <p class="causa">Direitos Humanos e Sociais</p>
          </div>
          <div class="causa_card">
            <div class="card_inner">
              <div class="face front">
                <img src="./assets/images/image-1.png" alt="" />
              </div>
              <div class="face back">
                <p class="descricao">
                  Preservam recursos naturais, promovem educação ambiental e
                  incentivam práticas sustentáveis. Desenvolvem ações contra o
                  desmatamento, a poluição e as mudanças climáticas.
                </p>
              </div>
            </div>
            <p class="causa">Meio Ambiente</p>
          </div>
          <div class="causa_card">
            <div class="card_inner">
              <div class="face front">
                <img src="./assets/images/image-2.png" alt="" />
              </div>
              <div class="face back">
                <p class="descricao">
                  Oferecem assistência médica, psicológica e social para
                  populações vulneráveis. Realizam campanhas de conscientização
                  e ampliam o acesso a tratamentos de saúde.
                </p>
              </div>
            </div>
            <p class="causa">Saúde e Bem-Estar</p>
          </div>
          <div class="causa_card">
            <div class="card_inner">
              <div class="face front">
                <img src="./assets/images/image-3.png" alt="" />
              </div>
              <div class="face back">
                <p class="descricao">
                  Ampliam o acesso à educação, oferecem apoio escolar e
                  incentivam a cultura. Desenvolvem projetos de alfabetização,
                  capacitação profissional e valorização das expressões
                  artísticas.
                </p>
              </div>
            </div>
            <p class="causa">Educação e Cultura</p>
          </div>
          <div class="causa_card">
            <div class="card_inner">
              <div class="face front">
                <img src="./assets/images/image-4.png" alt="" />
              </div>
              <div class="face back">
                <p class="descricao">
                  Resgatam, cuidam e promovem a adoção de animais abandonados.
                  Combatem maus-tratos, conscientizam sobre bem-estar animal e
                  atuam na preservação de espécies ameaçadas.
                </p>
              </div>
            </div>
            <p class="causa">Proteção Animal</p>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="links">
        <div>
          <p class="link_title">Seja Bem Vindo</p>
          <a href="#sobre">Descubra quem somos</a>
          <a href="#sobre">De uma olhada nas nossas redes sociais :</a>
        </div>
        <div>
          <p class="link_title">Ajuda</p>
          <a href="#sobre">Fale conosco</a>
          <a href="#sobre">Central de Suporte</a>
        </div>
        <div>
          <p class="link_title">Contato</p>
          <a href="#sobre">Instagram</a>
          <a href="#sobre">Whatsapp</a>
        </div>
      </div>
      <div class="logo">
        <p>Conectando corações</p>
        <img src="./assets/images/logo footer.png" alt="logo" />
        <p>transformando vidas</p>
      </div>
    </footer>
  </body>
</html>
