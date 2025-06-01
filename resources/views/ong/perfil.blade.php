<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Perfil da ONG</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/perfilONG.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">

    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">

    <script src="{{ asset('/assets/js/perfilONG.js') }}" defer></script>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>

<body>
    @if ($user->mercado_pago_user_id == null)
        <div class="modal" id="modal">
            <div class="modal-top">
                <h2>Cadastre sua conta do mercado pago</h2>
                <img src="{{ asset('assets/images/icons/close.svg') }}" id="closeModal" class="close">
            </div>
            <div class="modal-bottom">

                <h1>Bem vindo ao futuro!</h1>
                <p>Para facilitar o recebimento de pagamentos e gerenciar suas transações, cadastre sua conta do
                    MercadoPago
                    agora. Com isso, você poderá realizar pagamentos de forma mais rápida e segura.
                    Clique no botão abaixo para inserir seus dados e conectar sua conta.</p>

                <hr>
                <div class="botao-modal">
                    <img src="{{ asset('assets/images/icons/mercado-pago.png') }}" class="icone-modal-top">
                    @php
                        $clientId = env('MP_CLIENT_ID');
                        $redirectUri = env('MP_REDIRECT_URI');
                        $ongId = $user->id;
                        $url = "https://auth.mercadopago.com.br/authorization?response_type=code&client_id={$clientId}&redirect_uri={$redirectUri}&state={$ongId}";
                    @endphp
                    <a href="{{ $url }}" class="botao">Cadastrar</a>
                </div>
            </div>
        </div>
    @endif

    @if (session('errorMsg'))
        <div class="msg">
            <p class="errorMsg">{{ session('errorMsg') }}</p>
        </div>
    @elseif (session('sucMsg'))
        <div class="msg">
            <p class="sucMsg">{{ session('sucMsg') }}</p>
        </div>
    @endif

    <x-header />

    <main>
        <h1 class="titulo">Seu Projeto</h1>
        <section class="form">
            <form action="{{ route('ong.update') }}" method="POST">
                @csrf
                @method('PUT')
                <section>
                    <div class="nomeOng">
                        <label for="nomeOng">Nome</label>
                        <input class="input" type="text" name="nome" placeholder="Seu Nome"
                            value="{{ $user->nome }}" disabled />
                    </div>

                    <div class="nomeCriadores">
                        <label for="nomeCriadores">Criadores</label>
                        <input class="input" type="text" name="donos" placeholder="Seu Nome"
                            value="{{ $user->donos }}" disabled />
                    </div>

                    <div class="emialOng">
                        <label for="emialOng">Email</label>
                        <input class="input" type="email" name="email" placeholder="Seu Email"
                            value="{{ $user->email }}" disabled />
                    </div>

                    <div class="metaFinanceira">

                        <label for="metaFinanceira">Meta Financeira</label>
                        @php
                            function formatarMeta($valor)
                            {
                                return 'R$ ' . number_format($valor, 2, ',', '.');
                            }
                        @endphp

                        <input class="input" type="text" name="meta_financeira"
                            placeholder="Sua meta financeira" value="{{ formatarMeta($user->meta_financeira) }}"
                            id="metaFinanceira" disabled />
                    </div>

                    @if ($user->tipo_documento == 'CPF')
                        <div class="cpfOng">
                            <label for="cpfOng">CPF</label>
                            <input class="input" type="text" name="documento" placeholder="CPF do Proprietário"
                                value="{{ $user->documento }}" disabled />
                        </div>
                    @else
                        <div class="cnpjOng">
                            <label for="cnpjOng">CNPJ</label>
                            <input class="input" type="text" name="documento" placeholder="CNPJ da ONG"
                                value="{{ $user->documento }}" disabled />
                        </div>
                    @endif

                    <div class="descricaoOng">
                        <label for="descricaoOng">Descrição</label>
                        <textarea class="input" name="descricao" id="" disabled>{{ $user->descricao }}</textarea>
                    </div>
                </section>

                <section>
                    <div class="dataCriacao">
                        <label for="dataCriacao">Data de criação</label>
                        <input class="input" type="date" name="data_criacao"
                            placeholder="Data de criação da ONG" value="{{ $user->data_criacao }}" disabled />
                    </div>
                    <div class="cepOng">
                        <label for="cepOng">CEP</label>
                        <input onblur="pesquisacep(this.value);" id="cep" class="input" type="text"
                            name="cep" placeholder="Seu Cep" value="{{ $user->cep }}" disabled />
                    </div>


                    <div class="cidadeOng">
                        <label for="cidadeOng">Cidade</label>
                        <input id="cidade" class="input" type="text" name="cidade" placeholder="Seu Cidade"
                            value="{{ $user->cidade }}" disabled />
                    </div>
                    <div class="bairroOng">
                        <label for="bairroOng">Bairro</label>
                        <input id="bairro" class="input" type="text" name="bairro" placeholder="Seu Bairro"
                            value="{{ $user->bairro }}" disabled />
                    </div>
                    <div class="ruaOng">
                        <label for="ruaOng">Rua</label>
                        <input id="rua" class="input" type="text" name="rua" placeholder="Seu Rua"
                            value="{{ $user->rua }}" disabled />
                    </div>
                    <div class="num_estOng">
                        <div>
                            <label for="estadoOng">Estado</label>
                            <input id="uf" class="input" type="text" name="estado"
                                placeholder="Seu Estado" value="{{ $user->estado }}" disabled />
                        </div>
                        <div>
                            <label for="numOng">Número</label>
                            <input class="input" type="text" name="numero" placeholder="Seu Número"
                                value="{{ $user->numero }}" disabled />
                        </div>
                    </div>
                    <div class="telefoneOng">
                        <label for="telefoneOng">Telefone</label>
                        <input class="input" type="text" name="telefone" placeholder="Seu Telefone"
                            value="{{ $user->telefone }}" disabled />
                    </div>
                    <div>
                        <label for="necessidadesOng">Necessidades</label>
                        <input class="input" type="text" name="necessidades" id="necessidades"
                            value="{{ $user->necessidades }}" disabled>
                    </div>
                    <div class="editarPerfil">
                        <button id="editar">Editar</button>

                        <button type="submit" id="salvar" disabled>Salvar</button>

                        <button type="reset" id="cancelar" disabled>Cancelar</button>

                        <a href="{{ route('evento.create') }}" class="addEventos">Adicione Eventos</a>
                    </div>

                </section>
            </form>
            <section class="fotoPerfil">
                <div class="img">
                    <img src="{{ asset('uploads/logos/' . $user->logo) }}" alt="Foto de perfil" />
                </div>

                <form action="{{ route('ong.updateimg') }}" class="buttons" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="upload" class="upload-label">Clique aqui para mudar a foto</label>
                    <input type="file" id="upload" name="logo" accept="image/png, image/jpeg, image/jpg"
                        hidden onchange="this.form.submit()" />
                </form>
            </section>
        </section>
        <section class="gallery">
            <h2 class="title_gallery">Sua Galeria</h2>
            <div class="slider">
                @if ($fotos->isEmpty())
                    <p class="message">Parece que você ainda não adicionou fotos na sua galeria :(</p>
                @else
                    <p class="voltar seta">&gt;</p>
                    <div class="images-wrapper" id="images-wrapper">
                        <div class="images">
                            @foreach ($fotos as $foto)
                                <div class="img">
                                    <form action="{{ route('ong.removeimg', ['id' => $foto->id]) }}"
                                        class="deleteForm" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src="{{ asset('assets/images/icons/delete.svg') }}" alt="delete">
                                        </button>
                                    </form>
                                    <img src="{{ asset('uploads/galeria/' . $foto->caminho) }}"
                                        alt="galeria{{ $foto->id }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p class="proxima seta">&gt;</p>

                @endif
            </div>
            <form class="addimg" action="{{ route('ong.addimg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="add" class="add-label">Adicionar fotos</label>
                <input type="file" id="add" name="image" accept="image/png, image/jpeg, image/jpg" hidden
                    onchange="this.form.submit()" />
            </form>
        </section>
    </main>

    <x-footer />
</body>

</html>
