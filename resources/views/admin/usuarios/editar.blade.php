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

                <form action="" method="POST">
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
                </form>


            </div>

        </div>

        <a href="/admin/usuarios/" class="btn btn-primary">Salvar</a>
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
    @endsection
