@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Usuarios</h2>
    </div>

    <hr>
    {{-- @se (tiver algum erro) {
    execute isto
    } --}}
    @if ($errors->any())
        <div class="boxError alert alert-danger">

            <ul>
                {{-- percorre todos os erros da váriavel $errors e joga dentro de $erro --}}
                @foreach ($errors->all() as $erro)
                    {{-- mostra o $erro --}}
                    <li>{{ $erro }}</li>
                @endforeach

            </ul>

        </div>
    @endif

    {{-- O usuário preenche o formulário e clica no botão "Submit". Isso envia uma solicitação HTTP POST para a rota usuario.store (para enviar as informações do formulário) --}}
    {{-- A rota usuario.store está mapeada para o método store no UsuarioController. --}}
    {{-- O método store recebe a solicitação como um objeto Request. --}}
    <form action="{{ route('usuario.store') }}" method="POST">
        {{-- cria campo oculto com um token que permite o formulário ser submetido (pois ele "reforça" o nivel de segurança, para evitar possiveis ataques externos) --}}
        {{-- erro 419 é erro de segurança --}}
        @csrf
        <div class="row">
            <!--  mt-3 mb-3 p-4-->
            <div id="conteudo" class="col-md-6 mb-4">

                <div class="mb-3">

                    <label for="nome" class="form-label">Nome</label>
                    {{-- value="{{ old('nome') }} - ao clicar em salvar, as informações somem, mesmo tendo erro em apenas um campo, este comando, ao clicar em salvar, tendo erro em um campo --}}
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" value="{{ old('nome') }}">

                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com"
                        class="form-control" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirme a Senha</label>
                    {{-- este campo vai verificar se o valor dele é igual ao valor do campo password, atraves de _confirmation (e antes dele vem o nome do campo em questão, no caso, password, quero verificar se o campo atual tem o mesmo valor do campo password - isto vai acontecer pois no usuarioController, possui na verificação de validação do campo password, o "atributo", confirmed, fazendo com que eu precise utilizar password_confirmation no name, id e for daqui) --}}
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha"
                        class="form-control">
                </div>


            </div>

        </div>

        {{--  sempre utilizar button quando se trabalha com formulário, pois se não as informações não são submetidas (apenas) --}}
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
