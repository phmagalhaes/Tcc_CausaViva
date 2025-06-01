<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Causa Viva - Novo Evento</title>
    <link rel="stylesheet" href="{{ asset('style.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/criarEvento.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css')}}">
    <link rel="icon" href="{{ asset('assets/images/icons/logo.png') }}">
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
    <script src="{{ asset('assets/js/criarEvento.js') }}" defer></script>
</head>

<body>
    <x-msg />

    <x-header />

    <div class="title">
        <h1 class="titulo">Novo Evento</h1>
        <a href="{{ route('ong.perfil') }}">
            <img class="setaVoltar" src="../assets/images/iconeVoltar.png" alt="">
        </a>
    </div>

    <main>
        <form action="{{ route('evento.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="nomeEvento">
                <label for="">Nome do Evento</label>
                <input required type="text" name="nome" placeholder="Digite o nome do Evento">
            </div>

            <section>
                <div class="upload-container">
                    <label class="picture" for="picture__input" tabIndex="0">
                        <span class="picture__image"></span>
                    </label>
                    <input required type="file" name="foto" id="picture__input" accept="image/png, image/jpeg, image/jpg">
                </div>
                <div class="descricao">
                    <label for="">Descrição</label>
                    <textarea name="descricao" id="" placeholder="Digite uma descrição do evento"></textarea>
                </div>
            </section>

            <section>
                <div class="cep">
                    <label for="">Cep</label>
                    <input required type="text" id="cep" name="cep" placeholder="Digite o Cep" size="10"
                    maxlength="9" onblur="pesquisacep(this.value);">
                </div>

                <div class="cidade">
                    <label for="">Cidade</label>
                    <input required type="text" id="cidade" name="cidade" placeholder="Digite a cidade">
                </div>

                <div class="bairro">
                    <label for="">Bairro</label>
                    <input required type="text" id="bairro" name="bairro" placeholder="Digite o bairro">
                </div>
            </section>

            <section>
                <div class="rua">
                    <label for="">Rua</label>
                    <input required type="text" id="rua" name="rua" placeholder="Digite a rua">
                </div>

                <div class="numero">
                    <label for="">Número</label>
                    <input required type="text" name="numero" placeholder="Digite o número">
                </div>

                <div class="estado">
                    <label for="">Estado</label>
                    <input required type="text" id="uf" name="estado" placeholder="Estado">
                </div>
            </section>

            <section>
                <div class="data">
                    <label for="">Data do Evento</label>
                    <input required type="date" name="data">
                </div>

                <div class="horaInicio">
                    <label for="">Horário de Início</label>
                    <input required type="time" name="horario_inicio">
                </div>

                <div class="horaTermino">
                    <label for="">Horário de Término</label>
                    <input required type="time" name="horario_fim">
                </div>
            </section>

            <section>
                <div class="quantidadePessoa">
                    <label for="">Quantidade limite de pessoas</label>
                    <input required type="number" name="quantidade_pessoas" placeholder="Máximo de pessoas">
                </div>

                <div class="valor">
                    <label for="">Valor (R$)</label>
                    <input required id="valor" type="text" name="valor" placeholder="Valor da entrada">
                </div>
            </section>

            <div class="buttonSubmit">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </main>

    <x-footer />
</body>

</html>
