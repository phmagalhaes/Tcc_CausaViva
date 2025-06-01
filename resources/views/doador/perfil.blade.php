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
    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">

    <script src="{{ asset('/assets/js/perfilDoador.js') }}" defer></script>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>

<body>
    <x-msg />

    <x-header />

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
    
    <x-footer />
</body>

</html>
