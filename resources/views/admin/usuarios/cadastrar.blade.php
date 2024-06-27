@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Usuarios</h2>
    </div>

    <hr>

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
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">

                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="senha_confirma" class="form-label">Confirme a Senha</label>
                    <input type="password" name="senha_confirma" id="senha_confirma" placeholder="Confirme sua senha"
                        class="form-control">
                </div>


            </div>

        </div>

        {{--  sempre utilizar button quando se trabalha com formulário, pois se não as informações não são submetidas (apenas) --}}
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
