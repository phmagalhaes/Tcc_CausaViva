@php
    if (Auth()->user()->tipo == 'doador') {
        $nome = explode(' ', Auth()->user()->nome);
        $nome = $nome[0];
    } else {
        $nome = Auth()->user()->nome;
    }

    $doador = App\Models\Doador::where('email', Auth()->user()->email)->first();
    $ongUser = App\Models\Ong::where('email', Auth()->user()->email)->first();

    if (isset($doador) && $doador->foto != null) {
        $foto = $doador->foto;
    } elseif (isset($doador) && $doador->foto == null) {
        $foto = 'assets/images/menu/account.png';
    } elseif (isset($ongUser)) {
        $foto = $ongUser->logo;
    } else {
        $foto = 'assets/images/menu/account.png';
    }
@endphp

<div class="menu_bar" id="menu_bar">
    <div class="above">
        <a href="{{ route(Auth()->user()->tipo . '.perfil') }}" class="icon">
            @if ($foto == 'assets/images/menu/account.png')
                <img src="{{ asset($foto) }}" alt="">
            @else
                @if (isset($doador))
                    <img src="{{ asset("uploads/perfil/$foto") }}" alt="">
                @else
                    <img src="{{ asset("uploads/logos/$foto") }}" alt="">
                @endif
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

    <a href="{{ route('evento.index') }}">
        <div class="menu_bar_flag">
            <img src="{{ asset('assets/images/menu/flag.png') }}" alt="">
            <p>Confira todos os Eventos</p>
        </div>
    </a>

    @if (isset($ongUser))
        <hr style="margin: 0px 20px 0 20px; filter: opacity(30%);">

        <a href="{{ route('ong.estatisticas') }}">
            <div class="menu_bar_desconect">
                <img src="{{ asset('assets/images/menu/estatisticas.svg') }}" alt="">
                <p>Suas estatísticas e eventos</p>
            </div>
        </a>
    @endif

    <hr style="margin: 0px 20px 0 20px; filter: opacity(30%);">

    <a href="{{ route('logout') }}">
        <div class="menu_bar_desconect">
            <img src="{{ asset('assets/images/menu/cloud.png') }}" alt="">
            <p>Desconectar-se</p>
        </div>
    </a>


</div>

<div class="overlay" id="overlay" onclick="CloseMenu()"></div>

<header>
    <div class="main">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/images/Logo Header.png') }}" alt="logo" />
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
