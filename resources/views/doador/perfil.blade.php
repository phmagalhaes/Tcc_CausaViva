<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Perfil do Doador</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/perfilDOADOR.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">


    <script src="{{ asset('/assets/js/perfilDoador.js') }}" defer></script>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
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


    <main>
        <h1 class="titulo">Meu Perfil</h1>

        <section class="form">
            <form action="{{ route('doador.update') }}" method="POST">
                @csrf
                @method('PUT')
                <section class="section1">
                    <div class="nomePerfl">
                        <label for="nomePerfl">Nome</label>
                        <input class="input" type="text" name="nome" placeholder="Seu Nome"
                            value="{{ $user->nome }}" disabled />
                    </div>

                    <div class="emailPerfil">
                        <label for="emailPerfil">Email</label>
                        <input class="input" type="email" name="email" placeholder="Seu Email"
                            value="{{ $user->email }}" disabled />
                    </div>
                </section>
                <section class="section2">
                    <div>
                        <label for="causaPerfil">Causas em preferência</label>
                        <select class="input" name="causa" id="" disabled>
                            @php
                                $chave = array_search($user->causa, $causas);
                                unset($causas[$chave]);
                            @endphp
                            <option value="{{ $user->causa }}">
                                {{ $user->causa }}
                            </option>
                            @foreach ($causas as $causa)
                                <option value="{{ $causa }}">
                                    {{ $causa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="telefonePerfil">
                        <label for="telefonePerfil">Telefone</label>
                        <input class="input" type="text" name="telefone" placeholder="Seu Telefone"
                            value="{{ $user->telefone }}" disabled />
                    </div>
                    <div class="editarPerfil">
                        <button id="editar">Editar</button>
                        <button type="submit" id="salvar" disabled>Salvar</button>
                        <button type="reset" id="cancelar" disabled>Cancelar</button>
                    </div>
                </section>
            </form>

            <section class="fotoPerfil">
                <div class="img">
                    @if ($user->foto == null)
                        <img src="{{ asset('assets/images/perfil/foto_user.svg') }}" alt="Foto de perfil" />
                    @else
                        <img src="{{ asset('uploads/perfil/' . $user->foto) }}" alt="Foto de perfil" />
                    @endif
                </div>

                <form action="{{ route('doador.updateimg') }}" class="buttons" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($user->foto == null)
                        <label for="upload" class="upload-label">Clique aqui para adicionar uma foto</label>
                        <input type="file" id="upload" name="foto"
                            accept="image/png, image/jpeg, image/jpg" hidden onchange="this.form.submit()" />
                    @else
                        <div class="inputfoto">
                            <label for="upload" class="upload-label">Clique aqui para alterar a foto</label>
                            <input type="file" id="upload" name="foto"
                                accept="image/png, image/jpeg, image/jpg" hidden onchange="this.form.submit()" />
                        </div>
                        <a href="{{ route('doador.removeimg') }}">Remover Foto</a>
                    @endif

                </form>
            </section>
        </section>
        <div class="estatisticas">
            <div class="titulo-div">
                <h1 class="tituloContribuicao">Minhas contribuições</h1>
            </div>
            <div style="border-top: 1px solid #ccc; width: 85%; margin: 4vh 0 4vh 0;"></div>

            <div class="divisoria" style="background-color: var(--azul);">
                <h1 class="myDoacao">Minhas doações</h1>
            </div>
            @if ($doacoes->isEmpty())
                <p>Infelizmente você ainda não realizou nenhuma doação :(</p>
            @else
                @php
                    $total = 0;
                    foreach ($doacoes as $doacao) {
                        $total += $doacao->valor;
                    }
                @endphp
                <div class="doacoes">
                    <h1>Total doado:</h1>
                    <h1><b>R$ {{ number_format($total, 2, ',', '.') }}</b></h1> <!--BANCO DE DADOS-->
                </div>
                <div class="doacoes">
                    <h1 class="titulo3">Últimas doações:</h1>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th class="first" scope="col">Data</th>
                            <th scope="col">ONG</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doacoes as $doacao)
                            <tr>
                                <td class="first">{{ date_format($doacao->created_at, 'd/m/Y') }}</td>
                                @php
                                    $ong = App\Models\Ong::where('id', $doacao->id_ong)->first();
                                @endphp
                                <td>{{ $ong->nome }} - {{ $ong->causa }}</td>
                                <td class="td2">R${{ number_format($doacao->valor, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="divisoria" style="background-color: var(--verdeNeon );">
                <h1 class="titulo2">Eventos</h1>
            </div>
            @if ($eventos->isEmpty())
                <p>Você ainda não participou de nenhum evento :(</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th class="first" scope="col">Data</th>
                            <th scope="col">Evento</th>
                            <th scope="col">Local</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $evento)
                            <tr>
                                <td class="first">{{ date_format($evento->created_at, 'd/m/Y') }}</td>
                                @php
                                    $evento = App\Models\Evento::where('id', $evento->id_evento)->first();
                                    $ong = App\Models\Ong::where('id', $evento->id_ong)->first();
                                @endphp
                                <td>{{ $evento->nome }} - {{ $ong->nome }}</td>
                                <td class="td2">{{ $evento->cidade }} - {{ $evento->estado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="button-event">
                <a href="{{ route('evento.index') }}" id="">Ver mais eventos</a>
                <!--ROTA PARA A PÁGINA DE EVENTOS-->
                <a href="{{ route('home')}}" id="">Ver mais ONG´s</a> <!--ROTA PARA A PÁGINA DAS ONGS-->
            </div>
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
            <img src="../assets/images/logo footer.png" alt="logo" />
            <p>transformando vidas</p>
        </div>
    </footer>
</body>

</html>
