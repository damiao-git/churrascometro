@extends('layout.app')

@section('title', 'Criar novo churrasco')
@section('content')
    <div class="container">
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
        <div class="form-container">
            <form class="form" action="{{ route('churrasco.store') }}" method="post">
                <h1>NOVO CHURRASCO</h1>
                <hr class="linha">
                @csrf
                <div class="mb-3">
                    <label for="date" class="form-label">Data</label>
                    <input type="date" id="data" name="data" class="form-control" required>
                    <div class="text-secondary">Anote na sua agenda</div>
                </div>
                <div class="mb-3">
                    <label for="local" class="form-label">Local</label>
                    <input type="text" id="local" class="form-control" name="local" required>
                </div>
                <div class="mb-3">
                    <label for="people" class="form-label">Quantas pessoas irão?</label>
                    <input type="number" id="qnt_pessoas" class="form-control" name="qnt_pessoas" required>
                    <div></div>
                </div>
                <div class=botoes>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="{{ route('churrasco.create') }}" class="btn btn-secondary m-1">Novo</a>
                    <a href="{{ route('churrasco.index') }}" class="btn btn-secondary m-1">Lista</a>
                </div>
            </form>
        </div>
    </div>
@endsection
