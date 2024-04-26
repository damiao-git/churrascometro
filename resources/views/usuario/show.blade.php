@extends('layout.app')

@section('title', 'Detalhes do seu churrasco')
@section('content')

    <div class="container p-5">
        <h1>Detalhes</h1>
        <form class="form">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control"value="{{ $usuario->nome}}" disabled>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label" >Endereço</label>
                <input type="text" id="endereco" class="form-control" name="endereco"value="{{ $usuario->endereco}}" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email"value="{{ $usuario->email}}" disabled>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="telefone" id="telefone" class="form-control" name="telefone"value="{{ $usuario->telefone}}" disabled>
            </div>

        </form>
    </div>
@endsection
