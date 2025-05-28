<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/selecaoPagamento.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">
    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
    <title>Causa Viva - Pagamento</title>
</head>


<body>
    <x-msg />

    <x-header />

    <a href="./telaONG.html">
        <img class="setaVoltar" src="../assets/images/icones/iconeVoltar.png" alt="">
    </a>
    @php
        $id = request()->segment(count(request()->segments()));
    @endphp
    <div class="pesquisa">
        <h1 class="titulo">Pagamento</h1>
        <div class="main">
            <div class="sub-main">
                <h1 class="titulo">Selecione o quanto pretende doar</h1>
                <form action="{{ route('ong.doacao') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="cards">
                        <div class="card" id="card1">
                            <h2 class="titulo-card">Todo valor ajuda</h2>
                            <h1 class="valor">R$ 10,00</h1>
                            <input type="radio" id="valor" name="valor" value="10">
                        </div>
                        <div class="card" id="card2">
                            <h2 class="titulo-card">Uma boa ideia</h2>
                            <h1 class="valor">R$ 25,00</h1>
                            <input type="radio" id="valor" name="valor" value="25">
                        </div>
                        <div class="card" id="card3">
                            <h2 class="titulo-card">Uma ótima ideia!</h2>
                            <h1 class="valor">R$ 40,00</h1>
                            <input type="radio" id="valor" name="valor" value="40">
                        </div>
                        <div class="card" id="card4">
                            <h2 class="titulo-card">Incrivel demais!</h2>
                            <h1 class="valor">R$ 50,00</h1>
                            <input type="radio" id="valor" name="valor" value="50">
                        </div>
                        <div class="card" id="card5">
                            <h2 class="titulo-card">Transformando vidas</h2>
                            <h1 class="valor">R$ 75,00</h1>
                            <input type="radio" id="valor" name="valor" value="75">
                        </div>
                        <div class="card" id="card6">
                            <h2 class="titulo-card">Mudando o mundo :)</h2>
                            <h1 class="valor">R$ 100,00</h1>
                            <input type="radio" id="valor" name="valor" value="100">
                        </div>
                    </div>
                    @php
                        $doador = App\Models\Doador::where('email', auth()->user()->email)->first();
                    @endphp
                    <input type="hidden" name="id_doador" value="{{ $doador->id }}">
                    <input type="hidden" name="id_ong" value="{{ $id }}">
                    <div class="button">
                        <button type="submit"><b>Prosseguir</b></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <x-footer />
</body>

</html>
