<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <title>Causa Viva - Nossas ONG´s</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="{{ asset('assets/js/redirect.js') }}" defer></script>
</head>

<body>
    <header>
        <div class="main">
            <a href="{{ route('index') }}">
                <img src="../assets/images/Logo Header.png" alt="logo" />
            </a>
            <nav>
                @php
                    $nome = explode(' ', Auth()->user()->nome);
                    $nome = $nome[0];
                @endphp
                <p class="linkPerfil">Olá <strong>{{ $nome }}</strong></p>
            </nav>
        </div>
        <div class="slogan">
        </div>
    </header>
    <div class="pesquisa">
        <h1 class="titulo">Confira nossas ONGs</h1>
        <form>
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
    <main>
        @foreach ($causas as $causa)
            <div class="ongs">
                <h1 class="titulo2">{{ $causa }}</h1>
                <div class="cards">
                    @php
                        $ongs = App\Models\Ong::where('causa', $causa)->get();
                    @endphp
                    @if ($ongs->isEmpty())
                        <p>Parece que ainda não existem ONGs cadastradas para essa causa :(</p>
                    @endif
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
                                <img src="{{ asset('logos/' . $ong->logo) }}" alt="" />

                                <p class="ong">{{ $ong->nome }}</p>
                            </div>
                            <p class="description">
                                {{ $ong->descricao }}
                            </p>
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
