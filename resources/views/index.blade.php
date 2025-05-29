<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva</title>
    <link rel="stylesheet" href="{{ asset('./style.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}" />
    <script src="{{ asset('assets/js/index.js') }}" defer></script>
    <script src="{{ asset('assets/js/redirect.js') }}" defer></script>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">
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
                <p class="content2">Nossa plataforma conecta organizações e doadores, fortalecendo causas sociais com
                    eficiência e credibilidade na gestão de recursos.</p>
                <div class="links2">
                    @guest
                        <a href="{{ route('login') }}">Sua Boa Ação Começa Aqui!</a>
                    @endguest
                    @auth
                        <a href="{{ route('home') }}">Confira todas as ONGs!</a>
                    @endauth
                </div>
            </div>
            <img src="{{ asset('/assets/images/index/logo verde.png') }}" alt="logo" class="logo" />
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
                <img src="{{ asset('/assets/images/index/doar.webp') }}" alt="" />
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
                @foreach ($ongs as $ong)
                    @php
                        $doacoes = App\Models\Doacao::where('id_ong', $ong->id)->get();
                        if ($doacoes->isEmpty()) {
                            $valor = 0;
                            $total = 0;
                        } else {
                            $valor = 0;
                            foreach ($doacoes as $doacao) {
                                $valor += +$doacao->valor;
                            }
                            $total = 100 * $valor;
                            $total /= $ong->meta_financeira;
                            $total = round($total / 10) * 10;
                        }
                    @endphp
                    <div class="card" id="{{ $ong->id }}">
                        <div class="img">
                            <img src="{{ asset('uploads/logos/' . $ong->logo) }}" alt="" />

                            <p class="ong">{{ $ong->nome }}</p>
                        </div>
                        @if (strlen($ong->descricao) > 150)
                            <p class="description">{{ substr($ong->descricao, 0, 150) . '...' }}</p>
                        @else
                            <p class="description">{{ $ong->descricao }}</p>
                        @endif
                        <div class="meta">
                            <div class="grafico">
                                <div class="total{{ $total }}"></div>
                            </div>
                            <div class="legenda">
                                <p>{{ $total }}%</p>
                                <p>R${{ $valor }} Arrecadados</p>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="cidade">
                                <i class="fa-solid fa-location-dot"></i>
                                <p>{{ $ong->cidade }}, {{ $ong->estado }}</p>
                            </div>
                            <div class="causa">
                                <i class="fa-solid fa-tag"></i>

                                <p>{{ $ong->causa }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
    </main>
    
    <x-footer />
</body>

</html>
