@extends('layout.app')

@section('title', 'Criar novo churrasco')
@section('content')

    <div class="w-100 m-auto form-container text-white">
        <h1>Editar</h1>
        <form class="form" action="{{ route('churrasco.update', $churrasco->id)}}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" id="data" name="data" class="form-control" value="{{ $churrasco->data}}" required>
                <div class="text-secondary">Anote na sua agenda</div>
            </div>
            <div class="mb-3">
                <label for="local" class="form-label" >Local</label>
                <input type="text" id="local" class="form-control" name="local" value="{{ $churrasco->local}}" required>
            </div>
            <div class="mb-3">
                <label for="people" class="form-label">Quantas pessoas irão?</label>
                <input type="number" id="qnt_pessoas" class="form-control" name="qnt_pessoas" value="{{ $churrasco->qnt_pessoas}}" required>
                <div></div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
