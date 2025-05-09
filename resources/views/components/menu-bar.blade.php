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
                <img src="{{ asset("logos/$foto") }}" alt="">
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
    <a href="">
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
