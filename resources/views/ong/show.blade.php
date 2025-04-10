<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/telaONG.css') }}">
    <link rel="icon" type="image/png" href="./assetstr/icons/iconsite.png">
    <title>Causa Viva - ONG</title>
</head>

<body>
    <header>
        <main> 
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/Logo Header.png') }}" alt="logo" />
            </a>
            <nav>
                @php
                    $nome = explode(' ', Auth()->user()->nome);
                    $nome = $nome[0];
                @endphp
                <p class="linkPerfil">Olá <strong>{{ $nome }}</strong></p>
            </nav>
        </main>
        <div class="slogan">
        </div>
    </header>



    <div class="meta">
        <a href="{{ route('home') }}">
            <img class="setaVoltar" src="{{ asset('assets/images/iconeVoltar.png') }}" alt="">
        </a>
        <h1 class="titulo">{{ $ong->nome }}</h1>
        <p>Criado por {{ $ong->donos }}</p>
        <div class="meta-img">
            <img src="{{ asset('logos/' . $ong->logo)}}" class="imgprincipal">
            <div class="buttoneinfo">
                <div class="infometa">
                    <h1>R$ 14.000</h1>
                    <p>Apoiado por mais de <b>8.000</b> pessoas</p>
                    <div class="metas">
                        <div class="grafico">
                            <div class="total"></div>
                        </div>
                        <div class="legenda">
                            <p><b>112%</b> da meta alcançada</p>
                            <p><b>10</b> dias restantes</p>
                        </div>
                        <div class="textometa">
                            <h2>Meta inicial de</h2>
                            <h1 class="metainicial">R$ 12.500</h1>
                        </div>
                    </div>
                </div>
                <form>
                    <button>
                        <a href="selecaoPagamento.html">Apoiar ONG</a>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="eventos">
        <h1 class="titulo2">Eventos Registrados</h1>
        <div class="cards">
            <div class="card">
                <div class="img">
                    <img src="../assets/images/bazar.png" alt="" />
                </div>
                <h1 class="titulo-card">Bazar Solidário</h1>
                <p>
                    Venha, traga seu brinquedo e nos
                    ajude a reunir o maior número
                    possível de brinquedos para os
                    nossos amiguinhos.
                </p>
                <div class="card_icons">
                    <p class="local">São paulo, SP</p>
                    <p class="data">Dia 19/01</p>
                </div>
                <div class="card-bottom">
                    <a href="telaEvento.html">Marcar Presença</a>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/doacaocomida.png" alt="" />
                </div>
                <h1 class="titulo-card">Doação de Comida</h1>
                <p>
                    Traga sua doação de ração e nos
                    ajude a reunir o maior número
                    possível de alimentos para os
                    nossos amiguinhos
                </p>
                <div class="card_icons">
                    <p class="local">São paulo, SP</p>
                    <p class="data">Dia 23/05</p>
                </div>
                <div class="card-bottom">
                    <a href="telaEvento.html">Marcar Presença</a>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/feiraadocao.png" alt="" />
                </div>
                <h1 class="titulo-card">Feira de Adoção</h1>
                <p>
                    Venha, nos ajude a encontrar
                    um lar para os nossos amiguinhos!
                    Participe da nossa Feira de Adoção
                </p>
                <div class="card_icons">
                    <p class="local">São paulo, SP</p>
                    <p class="data">Dia 25/08</p>
                </div>
                <div class="card-bottom">
                    <a href="telaEvento.html">Marcar Presença</a>
                </div>
            </div>
        </div>
        <h1 class="titulo2">Sobre Nós</h1>
        <div class="sobre_ong">
            <h2>Somos uma ONG dedicada ao resgate,
                cuidado e promoção da adoção responsável
                de cachorros abandonados. Nosso trabalho
                vai além do resgate: oferecemos serviços
                essenciais de castração, vacinação e
                acompanhamento veterinário para garantir
                o bem-estar e a saúde dos animais. Com a
                ajuda de voluntários, parceiros e doações,
                conseguimos dar a esses animais a chance de
                um novo começo e um futuro cheio de amor e
                cuidado. Junte-se a nós nessa missão de
                transformar vidas e proporcionar a esses cães
                uma nova oportunidade de felicidade. Com sua ajuda,
                podemos continuar a mudar o mundo, um animal de cada vez!
            </h2>
            <img src="../assets/images/sobreong.png" class="sobre_ong_img">
        </div>
    </div>

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
            <img src="../assets/images/logo footer.png" alt="logo">
            <p>transformando vidas</p>
        </div>
    </footer>
</body>

</html>
