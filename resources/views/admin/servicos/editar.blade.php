@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Serviços</h2>
    </div>
    <hr>
    @if ($errors->any())
        <div class="boxError alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('servico.update', ['id' => $servico->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Seu Titulo"
                value="{{ old('titulo', $servico->titulo) }}">
        </div>


        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto[]" class="form-control" id="foto">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10">{{ old('titulo', $servico->descricao) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('servico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
