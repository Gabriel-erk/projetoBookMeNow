@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Usuarios</h2>
        <a href="{{ route('usuario.create') }}" class="btn btn-primary">Cadastrar</a>
    </div>

    <hr>

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
                        <a href="deletar.php" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
