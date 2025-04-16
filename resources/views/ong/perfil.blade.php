<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Perfil da ONG</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/perfilONG.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">

    <script src="{{ asset('/assets/js/perfilONG.js') }}" defer></script>
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>

<body>
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
        <a href="">
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
    <header>
        <div class="main">
            <a href="{{ route('index') }}">
                <img src="../assets/images/Logo Header.png" alt="logo" />
            </a>
            <div class="text">
                <nav>
                    <p class="linkPerfil">Olá <strong>{{ $nome }}</strong></p>
                </nav>
                <div class="menu">
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

    <h1 class="titulo">Seu Projeto</h1>

    <main>
        <form action="">
            <section>
                <div class="nomeOng">
                    <label for="nomeOng">Nome</label>
                    <input class="input" type="text" name="nomeOng" placeholder="Seu Nome"
                        value="{{ $user->nome }}" disabled />
                </div>

                <div class="nomeCriadores">
                    <label for="nomeCriadores">Criadores</label>
                    <input class="input" type="text" name="nomeCriadores" placeholder="Seu Nome"
                        value="{{ $user->donos }}" disabled />
                </div>

                <div class="emialOng">
                    <label for="emialOng">Email</label>
                    <input class="input" type="email" name="emialOng" placeholder="Seu Email"
                        value="{{ $user->email }}" disabled />
                </div>

                <div class="senhaOng">
                    <label for="senhaOng">Senha</label>
                    <input class="input" type="password" name="senhaOng" placeholder="Sua Senha"
                        value="{{ $user->password }}" disabled />
                </div>

                <div class="confirmeSenhaOng" id="confirmeSenha">
                    <label for="confirmeSenhaOng">Confirme sua Senha</label>
                    <input class="input" type="password" name="confirmeSenhaOng" placeholder="Confirme sua Senha"
                        value="{{ $user->password }}" disabled />
                </div>

                <div class="descricaoOng">
                    <label for="descricaoOng">Descrição</label>
                    <textarea class="input" name="descricaoOng" id="" disabled>{{ $user->descricao }}</textarea>
                </div>
            </section>

            <section class="necessidadesOng">
                <div class="dataCriacao">
                    <label for="dataCriacao">Data de criação</label>
                    <input class="input" type="date" name="dataCriacao" placeholder="Data de criação da ONG"
                        value="{{ $user->data_criacao }}" disabled />
                </div>

                <div class="metaFinanceira">

                    <label for="metaFinanceira">Meta Financeira</label>
                    @php
                        function formatarMeta($valor)
                        {
                            return 'R$ ' . number_format($valor, 2, ',', '.');
                        }
                    @endphp

                    <input class="input" type="text" name="metaFinanceira" placeholder="Sua meta financeira"
                        value="{{ formatarMeta($user->meta_financeira) }}" id="metaFinanceira" disabled />
                </div>
                <div class="cepOng">
                    <label for="cepOng">CEP</label>
                    <input class="input" type="text" name="cepOng" placeholder="Seu Cep"
                        value="{{ $user->cep }}" disabled />
                </div>
                <div class="telefoneOng">
                    <label for="telefoneOng">Telefone</label>
                    <input class="input" type="text" name="telefoneOng" placeholder="Seu Telefone"
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

            <section class="fotoPerfil">
                <img src="../assets/images/fotoPerfilOng.png" alt="" />
                <div class="buttons">
                    <button>Mudar</button>
                    <button>Remover</button>
                </div>
            </section>

        </form>
        <section class="gallery">
            <h2 class="title_gallery">Sua Galeria</h2>

            <div class="photos_gallery">

                <img src="../assets/images/photo1.png" alt="">

                <img src="../assets/images/photo2.png" alt="">

                <img src="../assets/images/photo3.png" alt="">

                <img src="../assets/images/photo4.png" alt="">

                <label class="picture" for="picture__input" tabIndex="0">
                    <span class="picture__image"></span>
                </label>
                <input type="file" name="picture__input" id="picture__input">
            </div>
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
