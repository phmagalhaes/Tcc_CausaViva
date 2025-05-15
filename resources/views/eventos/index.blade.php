<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/eventos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">

    <script src="{{ asset('/assets/js/menu.js') }}" defer></script>
    <title>Causa Viva - Nossos Eventos</title>
</head>

<body>
    @php
        if (Auth()->user()->tipo == 'doador') {
            $nome = explode(' ', Auth()->user()->nome);
            $nome = $nome[0];
        } else {
            $nome = Auth()->user()->nome;
        }
    @endphp
    <div class="menu_bar" id="menu_bar">
        <div class="above">
            <a href="{{ route(Auth()->user()->tipo . '.perfil') }}" class="icon">
                @php
                    $doador = App\Models\Doador::where('email', Auth()->user()->email)->first();
                    $ongUser = App\Models\Ong::where('email', Auth()->user()->email)->first();
                    if (isset($doador) && $doador->foto != null) {
                        $foto = $doador->foto;
                    } elseif (isset($doador) && $doador->foto == null) {
                        $foto = 'assets/images/menu/account.png';
                    } elseif (isset($ongUser)) {
                        $foto = $ongUser->logo;
                    }
                @endphp
                @if ($foto == 'assets/images/menu/account.png')
                    <img src="{{ asset($foto) }}" alt="">
                @else
                    <img src="{{ asset("logos/$foto") }}" alt="">
                @endif
            </a>
            <div class="menu_bar_info">
                <h2>{{ $nome }}</h2>
                <h4>Clique no ícone para acessar o perfil</h4>
            </div>
        </div>
        <a href="{{ route('home') }}">
            <div class="menu_bar_planet">
                <img src="{{ asset('assets/images/menu/planet.png') }}" class="menu_bar_icon">
                <p>Confira todas as Ongs</p>
            </div>
        </a>
        <hr style="margin: 0px 20px 0 20px; filter: opacity(30%);">
        <a href="">
            <div class="menu_bar_flag">
                <img src="{{ asset('assets/images/menu/flag.png') }}" alt="">
                <p>Confira todos os Eventos</p>
            </div>
        </a>
        <hr style="margin: 0px 20px 0 20px; filter: opacity(30%);">
        <a href="{{ route('logout') }}">
            <div class="menu_bar_desconect">
                <img src="{{ asset('assets/images/menu/cloud.png') }}" alt="">
                <p>Desconectar-se</p>
            </div>
        </a>
    </div>

    <div class="overlay" id="overlay"></div>

    <header>
        <div class="main">
            <a href="{{ route('index') }}">
                <img src="../assets/images/Logo Header.png" alt="logo" />
            </a>
            <div class="text">
                <nav>
                    <p class="linkPerfil">Olá <strong>{{ $nome }}</strong></p>
                </nav>
                <div class="menu" id="menu">
                    <div class="menu_icon open" id="menu_icon">
                        <div class="barra" id="barra1"></div>
                        <div class="barra" id="barra2"></div>
                        <div class="barra" id="barra3"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="slogan">
        </div>
    </header>
    
    <div class="pesquisa">
        <h1 class="titulo">Eventos</h1>
        <form>
            <label for="#"></label>
            <input class="input-pesquisa" type="search" id="#" name="#"
                placeholder="Pesquise por uma ong">
            <select class="select-pesquisa" id="categoria" name="categoria">
                <form action="">
                    <option value="" disabled selected>Selecione uma causa</option>
                    <option value="direitos">Direitos Humanos e Sociais</option>
                    <option value="ambiente">Meio Ambiente</option>
                    <option value="saude">Saúde e Bem-Estar</option>
                    <option value="educacao">Educação e Cultura</option>
                    <option value="cultura">Proteção Animal</option>
                </form>
            </select>
        </form>
    </div>
    <div class="eventos">
        <h1 class="titulo2">Proteção Animal</h1>
        <div class="cards">
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/bazar.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/doacaocomida.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/feiraadocao.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/bazar.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/doacaocomida.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="eventos">
        <h1 class="titulo2">Proteção Animal</h1>
        <div class="cards">
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/feiraadocao.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/bazar.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/doacaocomida.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="eventos">
        <h1 class="titulo2">Proteção Animal</h1>
        <div class="cards">
            <div class="card">
                <div class="img">
                    <img src="../assets/images/evento/bazar.png" alt="" />
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
                    <h2>Conferir Evento</h2>
                </div>
            </div>
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
            <img class="logoFooter" src="../assets/images/logo/logo footer.png" alt="logo">
            <p>transformando vidas</p>
        </div>
    </footer>
</body>

<script>
    cards = document.getElementsByClassName('card-bottom');
    for (let i = 0; i < cards.length; i++) {
        cards[i].addEventListener('click', function() {
            window.location.href = 'telaEvento.html';
        });
    }
</script>

</html>
