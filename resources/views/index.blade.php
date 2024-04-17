@extends('layout.app')

@section('title', 'Lista de Churrascos')
@section('content')
<h1>Bem vindo ao Churrascômetro!</h1>
<h2>Churrascos marcados até o momento</h2>
<table class="table table-hover">
    <thead>
        <tr class="table-secondary">
            <th>#</th>
            <th>Data</th>
            <th>Local</th>
            <th>Quantidade de Pessoas</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    @foreach ($churrascos as $churrasco)
        <tbody>
            <tr>
                <strong>
                    <th>{{ $churrasco->id }}</th>
                </strong>
                <td>{{ $churrasco->data }}</td>
                <td>{{ $churrasco->local }}</td>
                <td>{{ $churrasco->qnt_pessoas }}</td>
                <td><a href="{{ route('churrasco.show', $churrasco->id) }}" class="btn btn-primary">Ver</a></td>
                <td><a href="{{ route('churrasco.edit', $churrasco->id) }}" class="btn btn-secondary">Editar</a></td>
                <td><form action="{{ route('churrasco.delete', $churrasco->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form></td>
            </tr>
    @endforeach
    </tbody>
</table>
@endsection
