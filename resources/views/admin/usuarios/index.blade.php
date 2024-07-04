@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Usuarios</h2>
        <a href="{{ route('usuario.create') }}" class="btn btn-primary">Cadastrar</a>
    </div>

    <hr>

    <script>

        
        function confirmarExclusao() {
            /* 
            * confirm exibe um alert com uma mensagem
            * se o usuário clicar em "sim" será retornado true, e o formulário será submetido
            * caso clique em "cancelar/nao" não será submetido o formulário, fazendo com que o usuário não seja excluido (ai entra a questao "Route::delete", onde delete trabalha com formulários tambem)
            */
           return (confirm("Tem certeza que deseja excluir este registro?"));

        }

    </script>

    {{-- o comando with, utilizando em store, em usuario controller, cria uma sessão, então, SE houver uma sessão com o nome sucesso (ou seja, se houve um cadastro de usuário, sem nenhum erro, o comando do if provavelmente será executado), irá executar o conteúdo do if --}}
    @if (@session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    @if (@session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>

                <th>Nome</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            {{-- $usuarios pois é o nome que coloquei no parenteses de compact - return view('admin.usuarios.index',compact('usuarios'));
--}}
            {{-- $usuarios as $usuario - estou pegando o array $usuarios e jogando dentro de $usuario - a cada vez que ele passar pelo escopo do foreach, sera jogado dentro de $usuario (que naquele ponto vai ter o conteúdo de apenas um registro) e será imprimido na tela, e será repetido ate chegar ao ultimo indice do array --}}
            @foreach ($usuarios as $usuario)
                <tr>
                    {{-- selecionando o atributo id do usuário (no caso o usuário que estiver sendo imprimido no momento - ex: se for o usuário 1, vai trazer o id do usuário 1) --}}
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>

                    <td>
                        {{-- 
                    ['id' => 1]
                    ['nomeDoParâmetro' => valorQueVaiReceber]
                    --}}
                        {{-- ('usuario.show', ['id' => $usuario->id]) - a rota usuario.show direciona para o método show em usuarioController --}}
                        {{-- ['id' => $usuario->id]: Este é um array associativo passado como parâmetro para a função route. Ele substitui os parâmetros dinâmicos na rota nomeada. Neste caso, está substituindo o parâmetro id na rota usuario.show com o valor de $usuario->id.
 --}}
                        <a href="{{ route('usuario.show', ['id' => $usuario->id]) }}" class="btn btn-primary">Visualizar</a>
                        <a href="{{ route('usuario.edit', ['id' => $usuario->id]) }}" class="btn btn-secondary">Editar</a>

                        {{-- trocando o display para inline-block, pois o form vem por padrão com display block, fazendo com que não fique ao lado dos outros elementos, ele fica embaixo, trocando seu display isso se resolve --}}
                        <form action="{{ route('usuario.destroy', ['id' => $usuario->id]) }}" style="display: inline-block"
                            method="post">

                            @csrf
                            @method('delete')
                            {{-- onclick="return confirmarExclusao(); - quer dizer que quando este botão for clicado, a função confirmar exclusão será chamada, onde, se ela retornar true, o formulário será submetido (e o usuário será excluido - basicamente o comportamento padrão do botão do tipo 'submit'), caso retorne false o formulário não sera submetido, impedindo a exclusão --}}
                            <button type="submit" class="btn btn-danger" onclick="return confirmarExclusao();">Excluir</button>

                        </form>
                        {{-- <a href="{{ route('usuario.destroy', ['id' => $usuario->id]) }}" class="btn btn-danger">Excluir</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">

        {{ $usuarios->links('pagination::bootstrap-4') }}

    </div>
@endsection
