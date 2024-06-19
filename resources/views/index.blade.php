@extends('layout.app')

@section('title', 'Lista de Churrascos')
@section('content')

    @if (session('message'))
        <div class="text-success text-center fw-2">{{ session('message') }}</div>
    @endif
    <div class="container text-white d-flex flex-column">
        <div class="search-filter">
            <div class="novo">
                <a href="{{ route('churrasco.create') }}" class="action-button">Novo</a>
                <a href="{{ route('churrasco.index') }}" class="action-button">Lista</a>
            </div>
            <form action="{{ route('churrasco.search') }}" method="post">
                @csrf
                <input type="text" name="search" class="search" placeholder="Filtrar por nome">
                <button type="submit" class="button-search">Pesquisar</button>
            </form>
        </div>
        <div class="title">
            <h1>Bem vindo ao Churrascômetro!</h1>
            <h2>Churrascos marcados até o momento</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Local</th>
                    <th style="width:250px">Quantidade de Pessoas</th>
                    <th colspan="3" style="text-align:center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($churrascos as $churrasco)
                    <tr>
                        <td>{{ $churrasco->id }}</td>
                        <td>{{ date('d/m/Y', strtotime($churrasco->data)) }}</td>
                        <td>{{ $churrasco->local }}</td>
                        <td>{{ $churrasco->qnt_pessoas }}</td>
                        <td class="text-align-center"><a href="{{ route('churrasco.show', $churrasco->id) }}" class="action-button">Ver</a></td>
                        <td class="text-align-center"><a href="{{ route('churrasco.edit', $churrasco->id) }}" class="action-button">Editar</a></td>
                        <td class="text-align-center">
                            <form action="{{ route('churrasco.delete', $churrasco->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-button"
                                    onclick="return confirm('Excluir churrasco {{ $churrasco->local }} do dia {{ date('d/m/Y', strtotime($churrasco->data)) }}?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

    {{ $churrascos->links() }}
@endsection
