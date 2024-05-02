@extends('layout.app')

@section('title', 'Lista de Churrascos')
@section('content')

    @if (session('message'))
        <div class="text-success text-center fw-2">{{ session('message') }}</div>
    @endif
    <div class="container text-white">
        <div class="title text-center">
            <h1>Usuários</h1>
        </div>
        <table class="table table-bordered table-hover text-white">
            <thead>
                <tr class="table-secondary text-center">
                    <th>#</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            @foreach ($usuarios as $usuario)
                <tbody>
                    <tr>
                        <strong>
                            <th>{{ $usuario->id }}</th>
                        </strong>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->endereco }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->telefone }}</td>
                        <td><a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-primary">Ver</a></td>
                        <td><a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-secondary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('usuario.delete', $usuario->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Excluir usuario {{ $usuario->nome }}?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        <div class="footer">
            <a href="{{ route('usuario.create') }}" class="btn btn-secondary m-1">Novo</a>
            <a href="{{ route('usuario.index') }}" class="btn btn-secondary m-1">Lista</a>

        </div>
    </div>

    {{ $usuarios->links() }}
@endsection
