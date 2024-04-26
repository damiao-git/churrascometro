@extends('layout.app')

@section('title', 'Criar novo churrasco')
@section('content')
<div class="d-flex align-items-center py-4 bg-light">
    <div class="w-100 m-auto form-container">
        <h1>Novo Usuario</h1>
        <form class="form" action="{{ route('usuario.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label" >Endereço</label>
                <input type="text" id="endereco" class="form-control" name="endereco" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="telefone" id="telefone" class="form-control" name="telefone" required>
            </div>
            <div class=botoes>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('usuario.create')}}" class="btn btn-secondary m-1">Novo</a>
                <a href="{{ route('usuario.index')}}" class="btn btn-secondary m-1">Lista</a>
            </div>
        </form>
    </div>
</div>
@endsection
