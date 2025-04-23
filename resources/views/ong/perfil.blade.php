<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Perfil da ONG</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/perfilONG.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">

    <script src="{{ asset('/assets/js/perfilONG.js') }}" defer></script>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>

<body>
    @if (session('errorMsg'))
        <div class="msg">
            <p class="errorMsg">{{ session('errorMsg') }}</p>
        </div>
    @elseif (session('sucMsg'))
        <div class="msg">
            <p class="sucMsg">{{ session('sucMsg') }}</p>
        </div>
    @endif

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

    <header>
        <div class="main">
            <a href="{{ route('index') }}">
                <img src="../assets/images/Logo Header.png" alt="logo" />
            </a>
            <div class="text">
                <nav>
                    <p class="linkPerfil">Olá <strong>{{ $nome }}</strong></p>
                </nav>
                <div class="menu" id="menu">
                    <div class="menu_icon open" id="menu_icon">
                        <div class="barra" id="barra1"></div>
                        <div class="barra" id="barra2"></div>
                        <div class="barra" id="barra3"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="slogan">
        </div>

    </header>


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

                        <input class="input" type="text" name="meta_financeira" placeholder="Sua meta financeira"
                            value="{{ formatarMeta($user->meta_financeira) }}" id="metaFinanceira" disabled />
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

                        <a href="./criarEvento.html" class="addEventos">Adicione Eventos</a>
                    </div>

                </section>
            </form>
            <section class="fotoPerfil">
                <div class="img">
                    <img src="{{ asset('logos/' . $user->logo) }}" alt="Foto de perfil" />
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
                <img src="{{ asset("assets/images/icons/seta.svg") }}" alt="" class="voltar">
                <div class="images"></div>
                <img src="{{ asset("assets/images/icons/seta.svg") }}" alt="" class="proxima">
            </div>
            <form action="{{ route('ong.addimg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="add" class="add-label">Adicionar fotos</label>
                <input type="file" id="add" name="image" accept="image/png, image/jpeg, image/jpg" hidden
                    onchange="this.form.submit()" />
            </form>
        </section>
    </main>

    <footer>
        <div class="links">
            <div>
                <p class="link_title">Seja Bem Vindo</p>
                <a href="#sobre">Descubra quem somos</a>
                <a href="#sobre">De uma olhada nas nossas redes sociais :</a>
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
            <img src="../assets/images/logo footer.png" alt="logo" />
            <p>transformando vidas</p>
        </div>
    </footer>
</body>

</html>
