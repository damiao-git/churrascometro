@extends('layout.app')

@section('title', 'Detalhes do seu churrasco')
@section('content')

    <div class="container p-5">
        <h1>Detalhes</h1>
        <form class="form">
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" id="date" class="form-control" value="{{ $churrasco->data}}" disabled>
                <div class="text-secondary">Anote na sua agenda</div>
            </div>
            <div class="mb-3">
                <label for="local" class="form-label">Local</label>
                <input type="text" id="local" class="form-control" value="{{ $churrasco->local}}" disabled>
            </div>
            <div class="mb-3">
                <label for="people" class="form-label">Quantas pessoas irão?</label>
                <input type="text" id="people" class="form-control" value="{{ $churrasco->qnt_pessoas}}" disabled>
                <div></div>
            </div>

        </form>
    </div>
@endsection
