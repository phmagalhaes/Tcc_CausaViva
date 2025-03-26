<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/index.css') }}" />
    <script src="./assets/js/index.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="./assets/js/redirect.js" defer></script>
</head>

<body>
    <main>
        <section class="banner" id="banner">
            <div class="text">
                <p class="title">PLATAFORMA DE CONEXÃO PARA IMPACTO SOCIAL</p>
                <p class="subtitle">
                    Facilitamos o engajamento e a transparência nas doações
                </p>
                <p class="content">
                    A nossa plataforma é a escolha ideal para organizações e doadores
                    que desejam fortalecer causas sociais, garantindo eficiência e
                    credibilidade na gestão de recursos.
                </p>
                <div class="links2">
                    @guest
                        <a href="{{ route('login') }}">Sua Boa Ação Começa Aqui!</a>
                    @endguest
                    @auth
                      <a href="{{ route('home') }}">Confira todas as ONGs!</a>
                    @endauth
                </div>
            </div>
            <img src="./assets/images/index/logo verde.png" alt="logo" class="logo" />
        </section>
        <section class="color"></section>
        <section class="doar">
            <p class="title">Por que doar?</p>
            <div class="content">
                <p class="text1_p">
                    Doar é mais do que um ato de <span>generosidade</span>; é uma
                    oportunidade de <span>transformar vidas</span> e fortalecer causas
                    que precisam de apoio. Muitas ONGs enfrentam desafios para manter
                    suas iniciativas devido à falta de <span>recursos</span> e
                    <span>visibilidade</span>. Ao contribuir, você ajuda a garantir que
                    <span>projetos sociais</span> continuem impactando
                    <span>comunidades</span>, promovendo <span>mudanças reais</span> e
                    <span>sustentáveis</span>. Com nossa plataforma, sua
                    <span>doação</span> chega de forma <span>segura</span> e
                    <span>transparente</span> a quem realmente precisa, permitindo que
                    você acompanhe o <span>impacto</span> gerado. Seja parte dessa rede
                    de <span>solidariedade</span> e faça a <span>diferença</span>!
                </p>

                <p class="text2_p">Doar vai além da <span>generosidade</span>; é uma chance de <span>transformar
                        vidas</span> e
                    <span>fortalecer causas</span>. Muitas <span>ONGs</span> enfrentam
                    desafios por falta de <span>recursos</span>, e sua <span>contribuição</span> ajuda a manter
                    <span>projetos
                        sociais</span> ativos. Com nossa
                    <span>plataforma</span>, sua <span>doação</span> é <span>segura</span>, <span>transparente</span> e
                    gera
                    <span>impacto real</span>. Participe dessa <span>rede de solidariedade</span> e
                    <span>faça a diferença!
                </p>
                <img src="./assets/images/index/doar.webp" alt="" />
            </div>
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
                            <p class="descricao2">Garantem direitos fundamentais, promovem inclusão e combatem a
                                discriminação, oferecendo assistência jurídica e apoio a grupos vulneráveis.</p>
                        </div>
                    </div>
                    <p class="causa">Direitos Humanos<br>e Sociais</p>
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
                            <p class="descricao2">Preservam recursos naturais, promovem educação ambiental e lutam
                                contra desmatamento, poluição e mudanças climáticas.</p>
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
                            <p class="descricao2">Oferecem assistência médica, psicológica e social, além de campanhas
                                de conscientização e ampliação do acesso a tratamentos.</p>
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
                            <p class="descricao2"> Ampliam o acesso à educação, oferecem apoio escolar e promovem
                                alfabetização, capacitação e valorização cultural.</p>
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
                            <p class="descricao2"> Resgatam, cuidam e promovem a adoção de animais, combatem maus-tratos
                                e conscientizam sobre bem-estar animal e preservação de espécies.</p>
                        </div>
                    </div>
                    <p class="causa">Proteção Animal</p>
                </div>
            </div>
        </section>

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
