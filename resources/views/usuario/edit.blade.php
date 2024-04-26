@extends('layout.app')

@section('title', 'Criar novo churrasco')
@section('content')

<div class="container p-5">
    <h1>Editar</h1>
    <form class="form" action="{{ route('usuario.update', $usuario->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control"value="{{ $usuario->nome}}" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label" >Endereço</label>
            <input type="text" id="endereco" class="form-control" name="endereco"value="{{ $usuario->endereco}}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" name="email"value="{{ $usuario->email}}" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="telefone" id="telefone" class="form-control" name="telefone"value="{{ $usuario->telefone}}" required>
        </div>
        <div class=botoes>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{ route('usuario.create')}}" class="btn btn-secondary m-1">Novo</a>
            <a href="{{ route('usuario.index')}}" class="btn btn-secondary m-1">Lista</a>
        </div>
    </form>
</div>
@endsection
