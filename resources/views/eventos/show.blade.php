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
    <x-msg />

    <x-header />

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
                <p class="subtitulo-p">Organizado por <b class="subtitulo-b">{{ $ong->nome }}</b></p>
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
                            <div>
                                <p>Valor:</p>
                                <b>R$ {{ number_format($evento->valor, 2, ',', '.') }}</b>
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
    
    <x-footer />
</body>

</html>
