<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/telaEvento.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/components/footer.css') }}">
    <link rel="icon" type="image/png" href="../assetstr/icons/iconsite.png">
    <script src="{{ asset('/assets/js/menu.js') }}" defer></script>
    <title>Causa Viva - Evento</title>
</head>

<body>
    @if (session('errorMsg'))
        <div class="msg">
            <p class="errorMsg">{{ session('errorMsg') }}</p>
        </div>
    @elseif (session('sucMsg'))
        <div class="msg">
            <p class="sucMsg">{{ session('sucMsg') }}</p>
        </div>
    @endif

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

    <div class="pesquisa">
        <a href="{{ route('evento.index') }}">
            <img class="setaVoltar" src="../assets/images/iconeVoltar.png" alt="">
        </a>
        <div class="main">

            <div class="sub-main">
                <h1 class="titulo">{{ $evento->nome }}</h1>
                @php
                    $ong = App\Models\Ong::where('id', $evento->id)->first();
                @endphp
                <h2 class="subtitulo-p">Organizado por <b class="subtitulo-b">{{ $ong->nome }}</b></h2>
                <div class="conteudo">
                    <div class="itens-esquerda">
                        <div class="descricao">
                            <p>
                                {{ $evento->descricao }}
                            </p>
                        </div>
                        <div class="informacoes">
                            <b class="local">{{ $evento->rua }}, {{ $evento->numero }} - {{ $evento->bairro }},
                                {{ $evento->cidade }} - {{ $evento->estado }}</b>
                            <div class="programacao">
                                <p>Programado para o dia:</p>
                                <b>{{ date_format(new DateTime($evento->data), 'd/m') }}</b>
                            </div>
                            <div class="horario">
                                <p>Horário marcado:</p>
                                <b>{{ date_format(new DateTime($evento->horario_inicio), 'H:i') }} -
                                    {{ date_format(new DateTime($evento->horario_fim), 'H:i') }}</b>
                            </div>
                        </div>
                    </div>
                    @php
                        use Illuminate\Support\Facades\Auth;
                        use App\Models\Doador;
                        use App\Models\PresencaEvento;

                        $doador = Doador::where('email', Auth::user()->email)->first();
                        $presenca = false;

                        if ($doador) {
                            $presenca = PresencaEvento::where('id_doador', $doador->id)
                                ->where('id_evento', $evento->id)
                                ->exists();
                        }

                        $rotaPresenca = $presenca
                            ? route('evento.cancelar_presenca', ['id' => $evento->id])
                            : route('evento.confirmar_presenca', ['id' => $evento->id]);
                    @endphp

                    <form class="itens-direita" action="{{ $rotaPresenca }}" method="POST">
                        @csrf
                        @method('POST')

                        <img class="foto-dog" src="{{ asset('uploads/eventos/' . $evento->foto) }}">

                        @if ($presenca)
                            <button type="submit" class="botao">Cancelar Presença</button>
                        @else
                            <button type="submit" class="botao">Confirmar Presença</button>
                        @endif
                    </form>
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

</html>
