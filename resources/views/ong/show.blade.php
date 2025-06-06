<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/telaONG.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <link rel="icon" type="image/png" href="./assetstr/icons/iconsite.png">
    <title>Causa Viva - ONG</title>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    <x-msg />

    <x-header />

    <div class="meta">
        <a href="{{ route('home') }}">
            <img class="setaVoltar" src="{{ asset('assets/images/iconeVoltar.png') }}" alt="">
        </a>
        <h1 class="titulo">{{ $ong->nome }}</h1>
        <p>Criado por {{ $ong->donos }}</p>
        <div class="meta-img">
            <img src="{{ asset('uploads/logos/' . $ong->logo) }}" class="imgprincipal">
            <div class="buttoneinfo">
                <div class="infometa">
                    @php
                        $doacoes = App\Models\Doacao::where('id_ong', $ong->id)->get();
                        $total = 0;
                        $pessoas = 0;
                        foreach ($doacoes as $doacao) {
                            $total += $doacao->valor;
                            $pessoas += 1;
                        }
                        $porcentagem = 100 * $total;
                        $porcentagem /= $ong->meta_financeira;
                        $porcentagem = ceil($porcentagem);
                    @endphp
                    <h1>R$ {{ number_format($total, 2, ',', '.') }} <span style="font-size: 20px">arrecadados</span>
                    </h1>
                    @if ($pessoas > 1000)
                        <p>Apoiado por mais de <b>{{ $pessoas }}</b> pessoas</p>
                    @elseif ($pessoas == 1)
                        <p>Apoiado por <b>{{ $pessoas }}</b> pessoa</p>
                    @else
                        <p>Apoiado por <b>{{ $pessoas }}</b> pessoas</p>
                    @endif
                    <div class="metas">
                        <div class="grafico" style="border: 1px solid var(--verde)">
                            @if ($porcentagem <= 100)
                                <div class="total" style="width: {{ $porcentagem }}%;"></div>
                            @else
                                <div class="total" style="width: 100%;"></div>
                            @endif
                        </div>
                        <div class="legenda">
                            <p><b>{{ $porcentagem }}%</b> da meta alcançada</p>
                        </div>
                        <div class="textometa">
                            <h2>Meta inicial de</h2>
                            <h1 class="metainicial">R$ {{ number_format($ong->meta_financeira, 2, ',', '.') }}</h1>
                        </div>
                    </div>
                </div>
                <form>
                    <button>
                        <a href="{{ route('ong.redirect', ['id' => $ong->id]) }}">Apoiar ONG</a>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="sobre_ong">
        <article>
            <p class="sobre_title">Sobre Nós</p>
            <div class="top">
                <div class="descricao">
                    <p class="top_title">Quem somos</p>
                    <p class="content">Fundada em {{ date_format(new DateTime($ong->data_criacao), 'd/m/Y') }}.
                        {{ ucfirst($ong->descricao) }}</p>
                    <p class="top_title necessidades">Algumas das nossas necessidades</p>
                    <p class="content">{{ ucfirst($ong->necessidades) }}</p>
                </div>

                @php
                    function formatarTelefone($numero)
                    {
                        // Remove tudo que não for número
                        $numero = preg_replace('/\D/', '', $numero);

                        // Se for celular com 9 dígitos no Brasil (11 dígitos no total)
                        if (strlen($numero) === 11) {
                            return "($numero[0]$numero[1]) $numero[2]$numero[3]$numero[4]$numero[5]$numero[6]–$numero[7]$numero[8]$numero[9]$numero[10]";
                        }

                        // Se for telefone fixo (10 dígitos no total)
                        if (strlen($numero) === 10) {
                            return "($numero[0]$numero[1]) $numero[2]$numero[3]$numero[4]$numero[5]–$numero[6]$numero[7]$numero[8]$numero[9]";
                        }

                        // Retorna sem formatação se não bater com padrões esperados
                        return $numero;
                    }
                @endphp

                <div class="contato">
                    <p class="top_title">Entre em contato</p>
                    <div>
                        <p>Email:</p>
                        <p><strong>{{ $ong->email }}</strong></p>
                    </div>
                    <div>
                        <p>Telefone:</p>
                        <p><strong>{{ formatarTelefone( $ong->telefone ) }}</strong></p>
                    </div>
                    <div class="endereco">
                        <p>Endereço:</p>
                        <p><strong>{{ $ong->rua }}, {{ $ong->numero }} - {{ $ong->bairro }},
                                {{ $ong->cidade }} - {{ $ong->estado }}</strong></p>
                    </div>
                </div>
            </div>
            @if (!$fotos->isEmpty())
                <div class="carousel-container">
                    <div class="carousel-slide" id="carousel">
                        @foreach ($fotos as $foto)
                            <img src="{{ asset("/uploads/galeria/$foto->caminho") }}"
                                alt="fotom {{ $loop->index + 1 }}">
                        @endforeach
                    </div>
            @endif
        </article>
    </div>

    </div>
    <div class="eventos">
        <h1 class="titulo2">Próximos eventos</h1>
        <div class="cards">
            @if ($eventos->isEmpty())
                <p>Essa ONG não tem próximos eventos cadastrados :(</p>
            @else
                @foreach ($eventos as $evento)
                    <div class="card">
                        <div class="img">
                            <img src="{{ asset("uploads/eventos/$evento->foto") }}" alt="" />
                        </div>
                        <h1 class="titulo-card">{{ $evento->nome }}</h1>
                        <p class="descricao">
                            {{ $evento->descricao }}
                        </p>
                        <div class="card_icons">
                            <div>
                                <i class="fa-solid fa-location-dot"></i>
                                <p class="local">{{ $evento->cidade }}, {{ $evento->estado }}</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <p class="data">Dia {{ date_format(new DateTime($evento->data), 'd/m') }}</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-coins"></i>
                                <p>R$ {{ number_format($evento->valor, 2, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <a href="{{ route('evento.show', ['id' => $evento->id]) }}">Conferir Evento</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <x-footer />
    <script>
        const carousel = document.getElementById('carousel');
        const images = carousel.querySelectorAll('img');
        let index = 0;

        function showNextImage() {
            index = (index + 1) % images.length;
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(showNextImage, 3000); // troca a cada 3 segundos
    </script>
</body>

</html>
