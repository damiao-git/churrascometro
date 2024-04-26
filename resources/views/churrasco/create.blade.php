@extends('layout.app')

@section('title', 'Criar novo churrasco')
@section('content')
<div class="d-flex align-items-center py-4 bg-light">
    <div class="w-100 m-auto form-container">
        <h1>Novo Churrasco</h1>
        <form class="form" action="{{ route('churrasco.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" id="data" name="data" class="form-control" required>
                <div class="text-secondary">Anote na sua agenda</div>
            </div>
            <div class="mb-3">
                <label for="local" class="form-label" >Local</label>
                <input type="text" id="local" class="form-control" name="local" required>
            </div>
            <div class="mb-3">
                <label for="people" class="form-label">Quantas pessoas irão?</label>
                <input type="number" id="qnt_pessoas" class="form-control" name="qnt_pessoas" required>
                <div></div>
            </div>
            <div class=botoes>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('churrasco.create')}}" class="btn btn-secondary m-1">Novo</a>
                <a href="{{ route('churrasco.index')}}" class="btn btn-secondary m-1">Lista</a>
            </div>
        </form>
    </div>
</div>
@endsection
