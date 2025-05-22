<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estatisticas.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <title>Causa Viva - Suas Estatísticas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>

<body>
    <x-msg />
    <x-header />

    <div class="estatisticas">
        <div class="titulo-div">
            <h1 class="titulo">Suas Estatísticas</h1>
        </div>
        <div style="border-top: 1px solid #ccc; width: 85%; margin: 4vh 0 4vh 0;"></div>
        {{-- 
        <div class="titulo2" style="color: var(--azul);">Parabéns! você alcançou mais de <b>R$10.000</b> em doações
        </div> --}}
        <div class="divisoria" style="background-color: var(--azul);">
            <h1 class="titulo2">Doações Recebidas</h1>
        </div>
        <div class="doacoes">
            <h1>Total doado:</h1>
            <h1><b>R$ {{ number_format($total, 2, ',', '.') }}</b></h1>
        </div>
        <div class="doacoes">
            <h1 class="titulo3">Últimas doações:</h1>
        </div>

        <table>
            <caption>
                @php
                    $page = $_GET['page'] ?? 1;
                @endphp
                @if ($page != 1)
                    <a href="{{ '?page=' . $page - 1 }}">Anterior</a>
                @endif
                @if ($doacoes->hasMorePages())
                    <a href="{{ '?page=' . $page + 1 }}">Próxima</a>
                @endif
            </caption>
            <thead>
                <tr>
                    <th class="first" scope="col">Data</th>
                    <th scope="col">Doador</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doacoes as $doacao)
                    <tr>
                        <td class="first">{{ date_format(new DateTime($doacao->created_at), 'd/m/Y') }}</td>
                        @php
                            $doador = App\Models\Doador::where('id', $doacao->id_doador)->first();
                        @endphp
                        <td>{{ $doador->nome }}</td>
                        <td>R${{ number_format($doacao->valor, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="divisoria" style="background-color: var(--verdeNeon );">
            <h1 class="titulo2">Participações em eventos</h1>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="first" scope="col">Data</th>
                    <th scope="col">Participações</th>
                    <th scope="col">Local</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="first">20/05/2025</td> <!--BANCO DE DADOS-->
                    <td>143 Participações</td> <!--BANCO DE DADOS-->
                    <td>Jundiaí - SP</td> <!--BANCO DE DADOS-->
                </tr>
                <tr>
                    <td class="first">24/02/2025</td> <!--BANCO DE DADOS-->
                    <td>213 Participações</td> <!--BANCO DE DADOS-->
                    <td>Jundiaí - SP</td> <!--BANCO DE DADOS-->
                </tr>
                <tr>
                    <td class="first">18/01/2025</td> <!--BANCO DE DADOS-->
                    <td>89 Participações</td> <!--BANCO DE DADOS-->
                    <td>Itupeva - SP</td> <!--BANCO DE DADOS-->
                </tr>
            </tbody>
        </table>
        <div class="button">
            <a id="#">Criar Evento</a> <!--BANCO DE DADOS-->
        </div>
    </div>

    <x-footer />
</body>

</html>
