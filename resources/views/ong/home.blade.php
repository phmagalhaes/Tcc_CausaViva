<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">
    <title>Causa Viva - Nossas ONG´s</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">

    <script src="{{ asset('assets/js/redirect.js') }}" defer></script>
    <script src="{{ asset('assets/js/search.js') }}" defer></script>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>

<body>
    <x-msg />

    <x-header />

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
                                <div class="grafico" style="border: 1px solid var(--verde)">
                                    @if ($porcentagem <= 100)
                                        <div class="total" style="width: {{ $porcentagem }}%;"></div>
                                    @else
                                        <div class="total" style="width: 100%;"></div>
                                    @endif
                                </div>
                                <div class="legenda">
                                    <p><strong>{{ $porcentagem }}%</strong> da meta alcançada</p>
                                    <p><strong>R${{ $total }}</strong> Arrecadados</p>
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

    <x-footer />
</body>

</html>
