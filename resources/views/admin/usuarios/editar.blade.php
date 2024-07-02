@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Usuário</h2>
    </div>

    <hr>


    <div class="mb-4" id="centraliza">

        <div class="row">
            <!--  mt-3 mb-3 p-4-->
            <div id="conteudo" class="col-md-6 mb-4">

                {{-- ['id' => $usuario->id]) - vai permitir q eu traga nos campos input as informações daquele respectivo usuário, passada no controller --}}
                <form action="{{ route('usuario.update', ['id' => $usuario->id]) }}" method="POST">
                    <div class="mb-3">

                        <label for="nome" class="form-label">Nome</label>
                        {{-- value="{{ old('nome', $usuario->nome) }}" - passando 2 parametros, onde 'nome' é, caso houver um valor no campo nome, ele será mantido ALI, e $usuario->nome, é o valor que esta no banco de dados, no campo nome, e será o que ficará no "placeholder" por padrão  --}}
                        <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" value="{{ old('nome', $usuario->nome) }}">

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com"
                            class="form-control" value="{{ old('email', $usuario->email) }}">
                    </div>

                    <p class="alert alert-info">Mantenha o campo vazio caso deseje manter a senha atual</p>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirme a Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha"
                            class="form-control">
                    </div>
                </form>


            </div>

        </div>

        <a href="/admin/usuarios/" class="btn btn-primary">Salvar</a>
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
    @endsection
