@extends('layout.app')

@section('title', 'Lista de Churrascos')
@section('content')

    @if (session('message'))
        <div class="text-success text-center fw-2">{{ session('message') }}</div>
    @endif
    <div class="container">
        <div class="">
            <form action="{{ route('churrasco.search') }}" method="post">
                @csrf
                <input type="text" name="search" class="" placeholder="Filtrar por nome">
                <button type="submit" class="btn btn-secondary">Pesquisar</button>
            </form>
        </div>
        <div class="title text-center">
            <h1>Bem vindo ao Churrascômetro!</h1>
            <h2>Churrascos marcados até o momento</h2>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-secondary text-center">
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
                        <td>{{ date('d/m/Y', strtotime($churrasco->data)) }}</td>
                        <td>{{ $churrasco->local }}</td>
                        <td>{{ $churrasco->qnt_pessoas }}</td>
                        <td><a href="{{ route('churrasco.show', $churrasco->id) }}" class="btn btn-primary">Ver</a></td>
                        <td><a href="{{ route('churrasco.edit', $churrasco->id) }}" class="btn btn-secondary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('churrasco.delete', $churrasco->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Excluir churrasco {{ $churrasco->local }} do dia {{ date('d/m/Y', strtotime($churrasco->data)) }}?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        <div class="footer">
            <a href="{{ route('churrasco.create') }}" class="btn btn-secondary m-1">Novo</a>
            <a href="{{ route('churrasco.index') }}" class="btn btn-secondary m-1">Lista</a>

        </div>
    </div>

    {{ $churrascos->links() }}
@endsection
