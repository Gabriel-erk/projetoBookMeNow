@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Usuarios</h2>
        <a href="cadastrar.php" class="btn btn-primary">Cadastrar</a>
    </div>

    <hr>

    <table class="table table-striped">
        <tr>
            <th>ID:</th>
            <td>1</td>
        </tr>
        <tr>
            <th>Nome:</th>
            <td>Gabriel Erick</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>emailteste@teste.com</td>
        </tr>
    </table>
@endsection
