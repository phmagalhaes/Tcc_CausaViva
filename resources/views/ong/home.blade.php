<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
    <title>Causa Viva - Nossas ONG´s</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="{{ asset('assets/js/redirect.js') }}" defer></script>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
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
            <a href="{{ route(Auth()->user()->tipo . ".perfil")}}" class="icon">
                @php
                    $user = Auth()->user();
                    $doador = App\Models\Doador::where('email', $user->email)->first();
                    $ongUser = App\Models\Ong::where('email', $user->email)->first();
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
        <a href="{{ route("home") }}">
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
    <header>
        <div class="main">
            <a href="{{ route('index') }}">
                <img src="../assets/images/Logo Header.png" alt="logo" />
            </a>
            <div class="text">
                <nav>
                    <p class="linkPerfil">Olá <strong>{{ $nome }}</strong></p>
                </nav>
                <div class="menu">
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
        <h1 class="titulo">Confira nossas ONGs</h1>
        <form id="searchForm" method="get" action="{{ route('home') }}">
            <input value="{{ $busca }}" name="ong" class="input-pesquisa" type="search" id="searchInput"
                placeholder="Pesquise por uma ong">
            <select name="causa" class="select-pesquisa" id="categoriaSelect">
                <option value="">Selecione uma causa</option>
                @foreach ($causas as $causa)
                    <option value="{{ $causa }}" {{ $searchCausa == $causa ? 'selected' : '' }}>
                        {{ $causa }}
                    </option>
                @endforeach
            </select>
        </form>

    </div>
    <main>
        @foreach ($ongsPorCausa as $causa => $ongs)
            <div class="ongs">
                <h1 class="titulo2">{{ $causa }}</h1>
                <div class="cards">
                    @if ($ongs->isEmpty())
                        <p>Parece que ainda não existem ONGs cadastradas para essa causa :(</p>
                    @endif

                    @foreach ($ongs as $ong)
                        @php
                            $doacoes = App\Models\Doacao::where('id_ong', $ong->id)->get();
                            $valor = $doacoes->sum('valor');
                            $total = $ong->meta_financeira
                                ? round((100 * $valor) / $ong->meta_financeira / 10) * 10
                                : 0;
                        @endphp

                        <div class="card" id="{{ $ong->id }}">
                            <div class="img">
                                <img src="{{ asset('logos/' . $ong->logo) }}" alt="" />
                                <p class="ong">{{ $ong->nome }}</p>
                            </div>
                            <p class="description">{{ $ong->descricao }}</p>
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
            </div>
        @endforeach

    </main>

    <footer>
        <div class="links">
            <div>
                <p class="link_title">Seja Bem Vindo</p>
                <a href="#sobre">Descubra quem somos</a>
                <a href="#sobre">De uma olhada nas nossas redes sociais :)</a>
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
