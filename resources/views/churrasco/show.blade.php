@extends('layout.app')

@section('title', 'Detalhes do seu churrasco')
@section('content')

    <div class="container p-5 text-white">
        <h1>Detalhes</h1>
        <form class="form">
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" id="date" class="form-control" value="{{ $churrasco->data }}" disabled>
                <div class="text-secondary">Anote na sua agenda</div>
            </div>
            <div class="mb-3">
                <label for="local" class="form-label">Local</label>
                <input type="text" id="local" class="form-control" value="{{ $churrasco->local }}" disabled>
            </div>
            <div class="mb-3">
                <label for="people" class="form-label">Quantas pessoas irão?</label>
                <input type="text" id="people" class="form-control" value="{{ $churrasco->qnt_pessoas }}" disabled>
            </div>
        </form>
        <div class="container-fluid ">
            <div class="d-flex justify-content-center ">
                <div class="col p-1 d-flex justify-content-center">
                    <div class="card" style="width: 400px; height: 520px;">
                        <img src="http://localhost/churrascometro/app/Http/carne.jpg" class="card-img-top" alt="..." style="width: 400px">
                        <div class="card-body">
                            <h5 class="card-title">Carne</h5>
                            <p class="card-text">Quantidade: {{App\Http\Controllers\ChurrascoController::calcularCarne($churrasco->qnt_pessoas)}}</p>
                            <p class="card-text">Tipos recomendados: Picanha, Contra-filé, Maminha, Linguiça, Coxinha de frango, Tulipa</p>
                            <p class="card-text">Média por pessoa: Entre 300g e 500g</p>
                            <a href="#" class="btn btn-primary">Abrir Detalhes</a>
                        </div>
                    </div>
                </div>
                <div class="col p-1 d-flex justify-content-center">
                    <div class="card" style="width: 400px; height: 520px;">
                        <img src="http://localhost/churrascometro/app/Http/bebida.jpg" class="card-img-top" alt="..." style="width: 400px;  height: 267px">
                        <div class="card-body">
                            <h5 class="card-title">Bebidas</h5>
                            <p class="card-text">Quantidade: {{App\Http\Controllers\ChurrascoController::calcularBebida($churrasco->qnt_pessoas)}}</p>
                            <p class="card-text">Tipos recomendados: Refrigerante, Suco, Água, Cerveja, Bebidas quentes</p>
                            <p class="card-text">Média por pessoa: 1L</p>
                            <a href="#" class="btn btn-primary">Abrir Detalhes</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
