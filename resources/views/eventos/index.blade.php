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
    <script src="{{ asset('assets/js/search.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />


    <title>Causa Viva - Nossos Eventos</title>
</head>

<body>
    <x-msg />

    <x-header />

    <div class="pesquisa">
        <h1 class="titulo">Confira os Próximos Eventos</h1>
        <form id="searchForm" action="{{ route('evento.index') }}" method="get">
            <input value="{{ $busca }}" name="evento" class="input-pesquisa" type="search" id="searchInput"
                placeholder="Pesquise por um evento">
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
    @foreach ($eventosPorCausa as $causa => $eventos)
        <div class="eventos">
            <h1 class="titulo2">{{ $causa }}</h1>
            <div class="cards">
                @if ($eventos->isEmpty())
                    <p>Parece que ainda não existem eventos cadastrados para essa causa :(</p>
                @endif
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
            </div>
        </div>
    @endforeach

    <x-footer />
</body>

</html>
